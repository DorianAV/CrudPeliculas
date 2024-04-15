<?php
include("conection.php");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$comentario = $data['comentario'];
$correo = $data['correo'];
$idmovie = $data['idmovie'];
$rating = $data['rating'];


// Preparar la consulta SQL
$sql = "INSERT INTO comentario (comentario, correo,idmovie,rating) VALUES ('$comentario',  '$correo','$idmovie','$rating')";

// Ejecutar la consulta SQL
$res = mysqli_query($con, $sql);

// Verificar si la consulta se ha ejecutado correctamente
if (!$res) {
    echo json_encode(['error' => 'Error al insertar los datos',$comentario,$correo,$idmovie,mysqli_error($con)]);
    //echo $comentario;
   // echo $correo;
    //echo $idmovie;
    exit();
}

echo json_encode(['success' => 'Datos insertados correctamente']);