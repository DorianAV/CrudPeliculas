<?php
include("conection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$data = json_decode(file_get_contents('php://input'));

$id = $data->id;
$nombre = $data->nombre;
$descripcion = $data->descripcion;
$resena= $data->resena;
$calificacion = $data->calificacion;    
$link= $data->link;

$sql = "UPDATE movie SET nombre='$nombre', descripcion='$descripcion', resena=$resena, calificacion=$calificacion , link=$link WHERE id=$id";

$res=mysqli_query($con,$sql);
echo json_encode($res);