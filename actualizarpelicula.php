
<?php
include("conection.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


$json = json_decode(file_get_contents('php://input'));

$idPel = $json->idPel;
$titulo = $json->titulo;
$subtitulo = $json->subtitulo;
$resumen = $json->resumen;
$directores = $json->directores;
$guion = $json->guion;
$genero = $json->genero;
$pais = $json->pais;
$idioma = $json->idioma;
$duracion = $json->duracion;
$estreno = $json->estreno;
$calificacion = $json->calificacion;

$sql = "UPDATE peliculas SET titulo='$titulo', subtitulo='$subtitulo', resumen=$resumen, directores=$directores,guion=$guion,genero=$genero,pais=$pais,idioma=$idioma,duracion=$duracion,estreno=$estreno, calificacion=$calificacion WHERE idPel=$idPel";

$res=mysqli_query($conn,$sql);
echo json_encode($res);

?>
