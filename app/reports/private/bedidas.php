<?php
    require_once('../../../helpers/report.php');
    require_once('../../../models/bebidas.php');
        $pdf = new Report();
        $model = new Bebidas;

        $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);

        if(isset($_GET['action'])){
            if($_GET['max'] != '' && $_GET['min'] != ''){

                $pdf->startReport('Listado de bebidas Por producto.');

                $pdf->SetFillColor(175);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->Cell(0, 10, utf8_decode('Listado de bebidas de $'.$_GET['min'].' a $'.$_GET['max']), 1, 1, 'C', 1);

                $pdf->SetFillColor(150);
                $pdf->SetFont('Times', 'B', 12);
                if($data = $model->bebidaBetween($_GET['max'],$_GET['min'])){
                    $pdf->Cell(53, 10, utf8_decode('Bebida'), 1, 0, 'C', 1);
                    $pdf->Cell(83, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);
                    
                    $pdf->SetFont('Times', '', 11);
                    $pdf->SetFillColor(225);
                    foreach($data as $data){
                        $pdf->Cell(53, 10, utf8_decode($data['nombre_bebida']), 1, 0, 'C', 1);
                        $pdf->Cell(83, 10, utf8_decode($data['descripcion']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['tipo_bebida']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['precio']), 1, 1, 'C', 1);
                    }
                }
                else{
                    $pdf->Cell(0, 10, utf8_decode('No hay  bebidas disponibles.'), 1, 1);
                }
                
            }
            else if($_GET['max'] != '' && $_GET['min'] == ''){
                $pdf->startReport('Listado de bebidas Por producto.');

                $pdf->SetFillColor(175);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->Cell(0, 10, utf8_decode('Listado de bebidas menores de $'.$_GET['max']), 1, 1, 'C', 1);

                $pdf->SetFillColor(150);
                $pdf->SetFont('Times', 'B', 12);
                if($data = $model->bebidaMenorA($_GET['max'])){
                    $pdf->Cell(53, 10, utf8_decode('Bebida'), 1, 0, 'C', 1);
                    $pdf->Cell(83, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);
                    
                    $pdf->SetFont('Times', '', 11);
                    $pdf->SetFillColor(225);
                    foreach($data as $data){
                        $pdf->Cell(53, 10, utf8_decode($data['nombre_bebida']), 1, 0, 'C', 1);
                        $pdf->Cell(83, 10, utf8_decode($data['descripcion']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['tipo_bebida']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['precio']), 1, 1, 'C', 1);
                    }
                }
                else{
                    $pdf->Cell(0, 10, utf8_decode('No hay  bebidas disponibles.'), 1, 1);
                }
            }
            else if($_GET['max'] == '' && $_GET['min'] != ''){
                $pdf->startReport('Listado de bebidas Por producto.');

                $pdf->SetFillColor(175);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->Cell(0, 10, utf8_decode('Listado de bebidas mayores de $'.$_GET['min']), 1, 1, 'C', 1);

                $pdf->SetFillColor(150);
                $pdf->SetFont('Times', 'B', 12);
                if($data = $model->bebidaMayorA($_GET['min'])){
                    $pdf->Cell(53, 10, utf8_decode('Bebida'), 1, 0, 'C', 1);
                    $pdf->Cell(83, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);
                    
                    $pdf->SetFont('Times', '', 11);
                    $pdf->SetFillColor(225);
                    foreach($data as $data){
                        $pdf->Cell(53, 10, utf8_decode($data['nombre_bebida']), 1, 0, 'C', 1);
                        $pdf->Cell(83, 10, utf8_decode($data['descripcion']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['tipo_bebida']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['precio']), 1, 1, 'C', 1);
                    }
                }
                else{
                    $pdf->Cell(0, 10, utf8_decode('No hay  bebidas disponibles.'), 1, 1);
                }
            }
            else if($_GET['max'] == '' && $_GET['min'] == ''){
                $pdf->startReport('Listado de bebidas Por producto.');

                $pdf->SetFillColor(175);
                $pdf->SetFont('Times', 'B', 11);
                $pdf->Cell(0, 10, utf8_decode('Listado de bebidas ordenadas por el precio.'), 1, 1, 'C', 1);

                $pdf->SetFillColor(150);
                $pdf->SetFont('Times', 'B', 12);
                if($data = $model->bebidasReport()){
                    $pdf->Cell(53, 10, utf8_decode('Bebida'), 1, 0, 'C', 1);
                    $pdf->Cell(83, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);
                    
                    $pdf->SetFont('Times', '', 11);
                    $pdf->SetFillColor(225);
                    foreach($data as $data){
                        $pdf->Cell(53, 10, utf8_decode($data['nombre_bebida']), 1, 0, 'C', 1);
                        $pdf->Cell(83, 10, utf8_decode($data['descripcion']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['tipo_bebida']), 1, 0, 'C', 1);
                        $pdf->Cell(25, 10, utf8_decode($data['precio']), 1, 1, 'C', 1);
                    }
                }
                else{
                    $pdf->Cell(0, 10, utf8_decode('No hay  bebidas disponibles.'), 1, 1);
                }
            }

            $pdf->Output();
        }
        else{

            $pdf->startReport('Listado de bebidas Por producto.');

            $pdf->SetFillColor(175);
            $pdf->SetFont('Times', 'B', 11);
            $pdf->Cell(0, 10, utf8_decode('Listado de bebidas'), 1, 1, 'C', 1);

            $pdf->SetFillColor(150);
            $pdf->SetFont('Times', 'B', 12);
            if($data = $model->bebidasReport()){
                $pdf->Cell(53, 10, utf8_decode('Bebida'), 1, 0, 'C', 1);
                $pdf->Cell(83, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Precio (US$)'), 1, 1, 'C', 1);
                    
                $pdf->SetFont('Times', '', 11);
                $pdf->SetFillColor(225);
                foreach($data as $data){
                    $pdf->Cell(53, 10, utf8_decode($data['nombre_bebida']), 1, 0, 'C', 1);
                    $pdf->Cell(83, 10, utf8_decode($data['descripcion']), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode($data['tipo_bebida']), 1, 0, 'C', 1);
                    $pdf->Cell(25, 10, utf8_decode($data['precio']), 1, 1, 'C', 1);
                }
            }
            else{
                $pdf->Cell(0, 10, utf8_decode('No hay  bebidas disponibles.'), 1, 1);
            }

            $pdf->Output();
        }
?>