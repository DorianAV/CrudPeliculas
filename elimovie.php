<?php
include("conection.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

$id = $_GET['id'];

$sql = "DELETE FROM movie WHERE id = $id";

$res=mysqli_query($con,$sql);
echo json_encode($res);



