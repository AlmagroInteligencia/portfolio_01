<?php include("header.php"); ?>
<?php include("connection.php"); ?>
<?php

$objConnection = new connection();
$proyectos=$objConnection->consultar("select * from `proyectos`");  

?>

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Portfolio</h1>
        <p class="lead">Aquí podrán ver algunos de mis trabajos</p>
        <hr class="my-2">
        <p>Más info</p>
    </div>
</div>


<div class="row row-cols-1 row-cols-md-3 g-4">
  
<?php foreach($proyectos as $proyecto) { ?>  

  <div class="col">
    <div class="card">
      <img src="imagenes/<?php echo $proyecto['imagen']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $proyecto['nombre']; ?></h5>
        <p class="card-text"><?php echo $proyecto['descripcion']; ?></p>
      </div>
    </div>
  </div>

<?php } ?>
  
</div>

<?php include("footer.php"); ?>