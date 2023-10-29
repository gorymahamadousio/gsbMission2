<?php
use dompdf\dompdf;
use dompdf\options;

// include 
require_once '../dompdf/autoload.inc.php';

$options=new option();
$options->set('defaultFont','Courrier');
$dompdf= new dompdf($options);

$dompdf->loadHtml('coucou');
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$fichier='infos-visteur';
$dompdf->stream($fichier);
?>










@extends('sommaire')
@section('contenu1')
    <h1>Titre</h1>
@endsection
