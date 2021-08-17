<?php
require('../helpers/report.php');
require('../models/bebidas.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Bebidas por Tipo');

// Se instancia el módelo Categorías para obtener los datos.
$bebida = new Bebidas;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataBebidas = $bebida->readAll()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataBebidas as $rowBebida) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo de Bebidas:  '.$rowBebida['tipo_bebida']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($bebida->setId($rowBebida['id_tipo_bebida'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataBebidass = $bebida->readBebidastipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(40, 10, utf8_decode('Bebida'), 1, 0, 'C', 1);
                $pdf->Cell(40, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
                
                
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataBebidass as $rowBebida) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(40, 10, utf8_decode($rowBebida['nombre_bebida']), 1, 0);
                    $pdf->Cell(40, 10, utf8_decode($rowBebida['descripcion']), 1, 0);
                    $pdf->Cell(30, 10, utf8_decode($rowBebida['tipo_bebida']), 1, 0);
                    $pdf->Cell(46, 10, utf8_decode($rowBebida['precio']), 1, 0);
                }
                // Se imprimen los mensajes de errores
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay bebidas con este tipo de debidas'), 1, 0);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Bebida incorrecta o Inexistente'), 1, 0);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay bebidas para mostrar'), 1, 0);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>