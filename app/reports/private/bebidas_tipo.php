<?php
require('../../../helpers/report.php');
require('../../../models/bebidas.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Bebidas por Tipo');

// Se instancia el módelo Categorías para obtener los datos.
$bebida = new Bebidas;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataTipos = $bebida->readTipos()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataTipos as $rowTipo) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 11);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo de bebida:  '.$rowTipo['tipo_bebida']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($bebida->setTipo($rowTipo['id_tipo_bebida'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataBebidas = $bebida->readBebidasTipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 12);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(53, 10, utf8_decode('Bebida'), 1, 0, 'C', 1);
                $pdf->Cell(110, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                $pdf->Cell(23, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);       
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataBebidas as $rowBebida) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(53, 10, utf8_decode($rowBebida['nombre_bebida']), 1, 0);
                    $pdf->Cell(110, 10, utf8_decode($rowBebida['descripcion']), 1, 0);
                    $pdf->Cell(23, 10, utf8_decode($rowBebida['precio']), 1, 1);
                }
                // Se imprimen los mensajes de errores
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay bebidas con este tipo de debidas'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Bebida incorrecta o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay bebidas para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>