<?php include('vistas/vista-superior.php') ;?>
<div class="container" style="color: aliceblue;" >
<?php
include('conexion.php');
$buscar=$_POST['buscar'];
$consulta_limpia = mysqli_real_escape_string($con, $buscar);
$sql = "SELECT * FROM peliculas WHERE titulo LIKE '%$consulta_limpia%'";
$resultado = mysqli_query($con, $sql);
$num_filas = mysqli_num_rows($resultado);
if($num_filas >= 1){

   
?> 
<h1>Resultados para "<?php echo $buscar ?>"</h1>
  <article class="row">
    <?php
     while ($fila = $resultado->fetch_assoc()) { ?>

    <div class="col-lg-4 " style="color: aliceblue; " >
      <div class="card" style="background: rgb(0, 0, 0,0.3);" >
      <a href="vistaju.php?idju=<?php echo $fila['idju']?>">
      <img src="admin/<?php echo $fila['foto']?>" class="card-img-top" alt="..." width="90px" height="320px" ></a>
    <div class="card-body">
    <a href="vistaju.php?idju=<?php echo $fila['idju']?>" style="color: aliceblue; text-decoration: none; " onMouseOver="this.style.cssText='color: #00ff7f'" onMouseOut="this.style.cssText='color: #f0f8ff'" >
      <h5 class="card-title"><?php echo $fila['nombre']?></h5></a>
      <p class="card-text"><?php echo $fila['descripcion']?></p>
     </div>
      </div>
    </div>
    

  <?php }
  }
  else
echo "<h1 >Parece que no hay nada aqui</h1>";
 ?></article>
</div>
