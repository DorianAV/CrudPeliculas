<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Content-Type: application/json');
include("conection.php");

$id = $_GET['idRes'];

$sql = "SELECT * FROM resenaspelis WHERE IdPel = $id";

$res = mysqli_query($con,$sql);

$movies = array();

    while($row = mysqli_fetch_array($res)) {
        $movies[]=$row;
    }
    echo json_encode($movies);
