<?php
require('../../../helpers/report.php');
require('../../../models/menu.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Menu por fecha');

// Se instancia el módelo Categorías para obtener los datos.
$menu = new menu;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($datamenu = $menu->readAllMenu()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($datamenu as $rowmenu) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Fecha del menu:  '.$rowmenu['fecha']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($menu->setFecha($rowmenu['fecha'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($datamenuu = $menu->readMenuplatillo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(93, 10, utf8_decode('Nombre del platillo'), 1, 0, 'C', 1);
                $pdf->Cell(93, 10, utf8_decode('Descripción'), 1, 1, 'C', 1);
                
                
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($datamenuu as $rowmenu) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(93, 10, utf8_decode($rowmenu['nombre_platillo']), 1, 0);
                    $pdf->Cell(93, 10, utf8_decode($rowmenu['descripcion']), 1, 1);
                }
                // Se imprimen los mensajes de errores
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay platillos ingresados en esta fecha'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Platillo incorrecto o Inexistente'), 1, 0);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay platillos para mostrar'), 1, 0);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>