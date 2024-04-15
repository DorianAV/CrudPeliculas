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

$nombre = $data['nombre'];
$descripcion = $data['descripcion'];
$resena = $data['resena'];
$calificacion = $data['calificacion'];
$link = $data['link'];
$imagen = $data['imagen'];


// Preparar la consulta SQL
$sql = "INSERT INTO movie (nombre, descripcion, resena, calificacion, link, imagen) VALUES ('$nombre', '$descripcion', '$resena', '$calificacion', '$link', '$imagen')";

// Ejecutar la consulta SQL
$res = mysqli_query($con, $sql);

// Verificar si la consulta se ha ejecutado correctamente
if (!$res) {
    echo json_encode(['error' => 'Error al insertar los datos']);
    exit();
}

echo json_encode(['success' => 'Datos insertados correctamente']);