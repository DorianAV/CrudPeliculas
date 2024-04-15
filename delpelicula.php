
<?php
  header('Access-Control-Allow-Origin: *');

$idPel=$_GET['idPel'];

$sql="Delete from peliculas where idPel='$idPel'";
$conn = new mysqli('localhost', 'root', '', 'pelis');
$query=mysqli_query($conn,$sql);
mysqli_close($conn);
echo json_encode($query);
?>


