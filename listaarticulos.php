<?php
include("conection.php");

$sql = "SELECT * FROM movie";

$result = $conn->query($sql);

$articulos = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $movie = array(
            'id' => $row["id"],
            'nombre' => $row["nombre"],
        
        );
        $movies[] = $movie;
    }
    $json_articulos = json_encode($movies);
    echo $json_articulos;
} else {
    echo json_encode(array("error" => "No se encontraron artículos."));
}

$con->close();

