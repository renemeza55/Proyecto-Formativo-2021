<?php
    require_once('../../../helpers/report.php');
    require_once('../../../models/bitacora.php');

    $pdf = new Report();
    $model = new bitacoras;

    if(isset($_GET['action'])){
        switch($_GET['action']){
            case 'fecha':
                $pdf->startReport('Bitacora de compras.');

                $pdf->SetFillColor(175);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->Cell(0, 10, utf8_decode('Bitacora del dia '.$_GET['value']), 1, 1, 'C', 1);

                $pdf->SetFillColor(150);
                $pdf->SetFont('Times', 'B', 12);
                if($data = $model->reportePorFecha($_GET['value'])){
                    $pdf->Cell(53, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Precio ($)'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
                    $pdf->Cell(83, 10, utf8_decode('Proveedor'), 1, 1, 'C', 1);
                            
                    $pdf->SetFont('Times', '', 11);
                    $pdf->SetFillColor(225);
                    foreach($data as $data){
                        $pdf->Cell(53, 10, utf8_decode($data['producto']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['precio_prodcuto']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['fecha_bitacora']), 1, 0, 'C', 1);
                        $pdf->Cell(83, 10, utf8_decode($data['proveedor']), 1, 1, 'C', 1);
                    }
                }
                else{
                    $pdf->Cell(0, 10, utf8_decode('No hay  bitacoras disponibles.'), 1, 1);
                }
                break;
            case 'rango':
                if($_GET['max'] != '' && $_GET['min'] != ''){
                    $pdf->startReport('Bitacora de compras.');

                    $pdf->SetFillColor(175);
                    $pdf->SetFont('Times', 'B', 11);
                    $pdf->Cell(0, 10, utf8_decode('Bitacoras entre '.$_GET['min'].' a '.$_GET['max']), 1, 1, 'C', 1);

                    $pdf->SetFillColor(150);
                    $pdf->SetFont('Times', 'B', 12);
                    if($data = $model->reporteBetween($_GET['max'],$_GET['min'])){
                        $pdf->Cell(53, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode('Precio ($)'), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
                        $pdf->Cell(83, 10, utf8_decode('Proveedor'), 1, 1, 'C', 1);
                                
                        $pdf->SetFont('Times', '', 11);
                        $pdf->SetFillColor(225);
                        foreach($data as $data){
                            $pdf->Cell(53, 10, utf8_decode($data['producto']), 1, 0, 'C', 1);
                            $pdf->Cell(25, 10, utf8_decode($data['precio_prodcuto']), 1, 0, 'C', 1);
                            $pdf->Cell(25, 10, utf8_decode($data['fecha_bitacora']), 1, 0, 'C', 1);
                            $pdf->Cell(83, 10, utf8_decode($data['proveedor']), 1, 1, 'C', 1);
                        }
                    }
                    else{
                        $pdf->Cell(0, 10, utf8_decode('No hay  bitacoras disponibles.'), 1, 1);
                    }
                }
                else if($_GET['max'] != '' && $_GET['min'] == ''){
                    $pdf->startReport('Bitacora de compras.');

                    $pdf->SetFillColor(175);
                    $pdf->SetFont('Times', 'B', 11);
                    $pdf->Cell(0, 10, utf8_decode('Bitacora antes del '.$_GET['max']), 1, 1, 'C', 1);

                    $pdf->SetFillColor(150);
                    $pdf->SetFont('Times', 'B', 12);
                    if($data = $model->reporteAntes($_GET['max'])){
                        $pdf->Cell(53, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode('Precio ($)'), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
                        $pdf->Cell(83, 10, utf8_decode('Proveedor'), 1, 1, 'C', 1);
                                
                        $pdf->SetFont('Times', '', 11);
                        $pdf->SetFillColor(225);
                        foreach($data as $data){
                            $pdf->Cell(53, 10, utf8_decode($data['producto']), 1, 0, 'C', 1);
                            $pdf->Cell(25, 10, utf8_decode($data['precio_prodcuto']), 1, 0, 'C', 1);
                            $pdf->Cell(25, 10, utf8_decode($data['fecha_bitacora']), 1, 0, 'C', 1);
                            $pdf->Cell(83, 10, utf8_decode($data['proveedor']), 1, 1, 'C', 1);
                        }
                    }
                    else{
                        $pdf->Cell(0, 10, utf8_decode('No hay  bitacoras disponibles.'), 1, 1);
                    }
                }
                else if($_GET['max'] == '' && $_GET['min'] != ''){
                    $pdf->startReport('Bitacora de compras.');

                    $pdf->SetFillColor(175);
                    $pdf->SetFont('Times', 'B', 11);
                    $pdf->Cell(0, 10, utf8_decode('Bitacora desde del '.$_GET['min']), 1, 1, 'C', 1);

                    $pdf->SetFillColor(150);
                    $pdf->SetFont('Times', 'B', 12);
                    if($data = $model->reporteDespues($_GET['min'])){
                        $pdf->Cell(53, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode('Precio ($)'), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
                        $pdf->Cell(83, 10, utf8_decode('Proveedor'), 1, 1, 'C', 1);
                                
                        $pdf->SetFont('Times', '', 11);
                        $pdf->SetFillColor(225);
                        foreach($data as $data){
                            $pdf->Cell(53, 10, utf8_decode($data['producto']), 1, 0, 'C', 1);
                            $pdf->Cell(25, 10, utf8_decode($data['precio_prodcuto']), 1, 0, 'C', 1);
                            $pdf->Cell(25, 10, utf8_decode($data['fecha_bitacora']), 1, 0, 'C', 1);
                            $pdf->Cell(83, 10, utf8_decode($data['proveedor']), 1, 1, 'C', 1);
                        }
                    }
                    else{
                        $pdf->Cell(0, 10, utf8_decode('No hay  bitacoras disponibles.'), 1, 1);
                    }
                }
                else if($_GET['max'] != '' && $_GET['min'] != ''){

                }
                break;
        }

        $pdf->Output();
    }
    else{
        $pdf->startReport('Bitacora completa.');

        $pdf->SetFillColor(175);
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell(0, 10, utf8_decode('Bitacora de compra.'), 1, 1, 'C', 1);

        $pdf->SetFillColor(150);
        $pdf->SetFont('Times', 'B', 12);
        if($data = $model->reporteCompleto()){
            $pdf->Cell(53, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
            $pdf->Cell(25, 10, utf8_decode('Precio ($)'), 1, 0, 'C', 1);
            $pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
            $pdf->Cell(83, 10, utf8_decode('Proveedor'), 1, 1, 'C', 1);
                    
            $pdf->SetFont('Times', '', 11);
            $pdf->SetFillColor(225);
            foreach($data as $data){
                $pdf->Cell(53, 10, utf8_decode($data['producto']), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode($data['precio_prodcuto']), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode($data['fecha_bitacora']), 1, 0, 'C', 1);
                $pdf->Cell(83, 10, utf8_decode($data['proveedor']), 1, 1, 'C', 1);
            }
        }
        else{
            $pdf->Cell(0, 10, utf8_decode('No hay  bitacoras disponibles.'), 1, 1);
        }

        $pdf->Output();
    }

?>