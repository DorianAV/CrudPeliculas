<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');
include("conection.php");

$username = mysqli_real_escape_string($con, $_GET['username']);
$password = mysqli_real_escape_string($con, $_GET['password']);

$sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";

$res = mysqli_query($con, $sql);

$articulo = array();

while ($row = mysqli_fetch_array($res)) {
    $articulo[] = $row;
}

echo json_encode($articulo);

mysqli_close($con);

