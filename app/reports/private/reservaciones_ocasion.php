<?php
require('../../../helpers/report.php');
require('../../../models/reservaciones.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Reservaciones por Ocasión');

// Se instancia el módelo Categorías para obtener los datos.
$reservacion = new Reservaciones;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataReservaciones = $reservacion->readAll()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataReservaciones as $rowReservacion) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Tipo de Bebidas:  '.$rowReservacion['descripcion']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($reservacion->setId($rowReservacion['id_reservacion'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataReservacioness = $reservacion->readReservacionesocasion()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(40, 10, utf8_decode('Día de reservación'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Horario de reservación'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Cantidad de personas'), 1, 0, 'C', 1);
                
                
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataReservacioness as $rowReservacion) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(40, 10, utf8_decode($rowReservacion['dia']), 1, 0);
                    $pdf->Cell(30, 10, utf8_decode($rowReservacion['horario']), 1, 0);
                    $pdf->Cell(46, 10, utf8_decode($rowReservacion['personas']), 1, 0);
                }
                // Se imprimen los mensajes de errores
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay reservaciones con esta ocasión'), 1, 0);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Reservacion incorrecta o Inexistente'), 1, 0);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay reservaciones para mostrar'), 1, 0);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>