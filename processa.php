<?php

require "./vendor/autoload.php";

use app\lib\Request;

$cepOrig = trim($_POST['cepO']);
$cepDes = trim($_POST['cepD']);
$peso = trim($_POST['peso']);
$formato = trim($_POST['formato']);
$comprimento = trim($_POST['comprimento']);
$altura = trim($_POST['altura']);
$largura = trim($_POST['largura']);
$codServico = trim($_POST['codigo']);
$diametro = trim($_POST['diametro']);
$aviso = trim($_POST['aviso']);

Request::request(null,null,$cepOrig,$cepDes,$peso,$formato,$comprimento,$altura,$largura,null,null,$aviso,$codServico,$diametro);