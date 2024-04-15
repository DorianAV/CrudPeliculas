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
$compania = $data['compania'];
$fecha = $data['fecha'];
$link = $data['link'];
$contenido = $data['contenido'];
$idPel = $data['IdPel'];


// Preparar la consulta SQL
$sql = "INSERT INTO resenaspelis (nombre, compania, fecha,link,contenido,IdPel) VALUES ('$nombre', '$compania', '$fecha','$link','$contenido','$idPel')";

// Ejecutar la consulta SQL
$res = mysqli_query($con, $sql);

// Verificar si la consulta se ha ejecutado correctamente
if (!$res) {
    echo json_encode(['error' => 'Error al insertar los datos']);
    exit();
}

echo json_encode(['success' => 'Datos insertados correctamente']);