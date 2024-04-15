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

$titulo = $data['titulo'];
$subtitulo = $data['subtitulo'];
$resumen = $data['resumen'];
$directores = $data['directores'];
$guion = $data['guion'];
$genero = $data['genero'];
$pais = $data['pais'];
$idioma = $data['idioma'];
$duracion= $data['duracion'];
$estreno = $data['estreno'];
$calificacion = $data['calificacion'];


// Preparar la consulta SQL
$sql = "INSERT INTO peliculas (titulo, subtitulo, resumen,directores,guion,genero,pais,idioma,duracion,estreno,calificacion) VALUES ('$titulo', '$subtitulo', '$resumen','$directores','$guion','$genero','$pais','$idioma','$duracion','$estreno','$calificacion')";

// Ejecutar la consulta SQL
$res = mysqli_query($con, $sql);

// Verificar si la consulta se ha ejecutado correctamente
if (!$res) {
    echo json_encode(['error' => 'Error al insertar los datos']);
    exit();
}

echo json_encode(['success' => 'Datos insertados correctamente']);