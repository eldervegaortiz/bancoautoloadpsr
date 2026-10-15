<?php
require_once __DIR__ . '/vendor/autoload.php';

use View\ConsultaBanco;
use View\VisualizarBanco;
use Controller\ControladorBanco;

// 1. Mostrar formulario
$consulta = new ConsultaBanco();
$consulta->consultar();

// 2. Ejecutar controlador y reportes
$vista = new VisualizarBanco();
$controlador = new ControladorBanco($vista);
$controlador->desarrollar();