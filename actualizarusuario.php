
<?php
include("conection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$json = json_decode(file_get_contents('php://input'));

$id = $json->idRes;
$nombre = $json->nombre;
$compania = $json->compania;
$fecha = $json->fecha;
$link = $json->link;
$contenido = $json->contenido;
$idPel = $json->idPel;

$sql = "UPDATE resenaspelis SET nombre='$nombre', compania='$compania', fecha=$fecha, link=$link,contenido=$contenido,idPel='$idPel' WHERE idRes=$id";

$res=mysqli_query($conn,$sql);
echo json_encode($res);

?>
