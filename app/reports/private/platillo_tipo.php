<?php
require('../../../helpers/report.php');
require('../../../models/platillos.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Platillos por Tipo');

// Se instancia el módelo Categorías para obtener los datos.
$platillos = new platillos;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataplatillos = $platillos->readAll2()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataplatillos as $rowplatillos) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo de platillo:  '.$rowplatillos['tipo_platillo']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($platillos->setId($rowplatillos['id_tipo_plt'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataplatilloss = $platillos->readPlatillotipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(50, 10, utf8_decode('Nombre del platillo'), 1, 0, 'C', 1);
                $pdf->Cell(90, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Precio'), 1, 1, 'C', 1);
                
                
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataplatilloss as $rowplatillos) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(50, 10, utf8_decode($rowplatillos['nombre_platillo']), 1, 0);
                    $pdf->Cell(90, 10, utf8_decode($rowplatillos['descripcion']), 1, 0);
                    $pdf->Cell(46, 10, utf8_decode($rowplatillos['precio']), 1, 1);
                }
                // Se imprimen los mensajes de errores
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay platillos con este tipo de platillos'), 1, 1);
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