<?php
//Controladores
require_once "controllers/PlantillaControlador.php";
require_once "controllers/VisitasControlador.php";

require_once "models/VisitasModelo.php";
// Llamado a los objetos
$plantilla = new PlantillaControlador();
$plantilla->ctrPlantilla();
