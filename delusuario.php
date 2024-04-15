
<?php
  header('Access-Control-Allow-Origin: *');

$id=$_GET['idRes'];

$sql="Delete from resenaspelis where idRes='$id'";
$conn = new mysqli('localhost', 'root', '', 'pelis');
$query=mysqli_query($conn,$sql);
mysqli_close($conn);
echo json_encode($query);
?>


