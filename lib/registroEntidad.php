<?php
require_once "../models/connectDBA.php";

$docRuc = $_POST["nRucEnt"];
$descEntidad = $_POST["rSocialEnt"];

if (isset($docRuc) && isset($descEntidad) && $docRuc != "" && $descEntidad != "") {
    $sql = "INSERT INTO rv_entidades(docRuc,descEntidad) VALUES('$docRuc','$descEntidad')";
    echo mysqli_query($conexion, $sql);
}