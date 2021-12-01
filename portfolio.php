<?php include("header.php"); ?>
<?php include("connection.php"); ?>
<?php

    if($_POST){
        
        if($_POST['nombre'] && $_POST['descripcion'] && $_FILES['archivo'] && $_FILES['archivo']['name']){

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            $fecha=new DateTime();

            $imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];

            $imagenTemporal=$_FILES['archivo']['tmp_name'];
            move_uploaded_file($imagenTemporal,"imagenes/".$imagen);
            
            $objConnection = new connection();
            $sql = "INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) 
            VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
            $objConnection->ejecutar($sql);

            header("location:portfolio.php");

        }else {
            echo "<script> alert('Dale, pibe, ¿Me estás jodiendo? Fijate de llenar bien todos los cositos') </script>";
        }   
    
    }

    if($_GET){

        $id=$_GET['borrar'];
        $objConnection = new connection();

        $imagen=$objConnection->consultar("select imagen from `proyectos` where id=".$id); 
        unlink("imagenes/".$imagen[0]['imagen']);
        $sql = "DELETE FROM `proyectos` WHERE `proyectos`.`id` = '$id'";
        $objConnection->ejecutar($sql);

        header("location:portfolio.php");

    }

    $objConnection = new connection();
    $proyectos=$objConnection->consultar("select * from `proyectos`");

?>


<br><br>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                Datos del proyecto
                            </div>
                            <div class="card-body">
                                <form action="portfolio.php" method="post" enctype="multipart/form-data">
                                    Nombre del proyecto: <input required type="text" class="form-control" name="nombre" id="">
                                    <br>
                                    Imagen del proyecto: <input required type="file" class="form-control" name="archivo" id="">
                                    <br>
                                    Descripción:
                                    <textarea required class="form-control" name="descripcion" id="" rows="4"></textarea>
                                    <br>
                                    <button class="btn btn-success" type="submit">Enviar proyecto</button>
                                    <br>
                                </form>
                            </div>     
                        </div>
            </div> 
            <div class="col-md-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($proyectos as $proyecto) { ?>
                        <tr>
                            <td><?php echo $proyecto['id']; ?></td>
                            <td><?php echo $proyecto['nombre']; ?></td>
                            <td><img width=100 src="imagenes/<?php echo $proyecto['imagen']; ?>"></td>
                            <td><?php echo $proyecto['descripcion']; ?></td>
                            <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id']; ?>" >Eliminar</a></td>
                            <td><a class="btn btn-warning" href="?modificar=<?php echo $proyecto['id']; ?>" >Modificar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
    


<?php include("footer.php"); ?>