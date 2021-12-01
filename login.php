<?php

  session_start();

  if($_POST){
    if($_POST['usuario']=="admin" && ($_POST['password']=="admin")) {
      $_SESSION['usuario']="admin";
      header("location:index.php");
    }
    else{
      echo "<script>alert('No, papu, vos no podés entrar acá...');</script>";
    }
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>

    <div class="p-5 bg-light">
        <div class="container">
        
            <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Iniciar Sesión
                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        Usuario: <input type="text" class="form-control" name="usuario" id="">
                        <br>
                        Contraseña: <input type="password" class="form-control" name="password" id="">
                        <br>
                        <button class="btn btn-success" type="submit">Iniciar Sesión</button>
                        <br><br>
                        <p><?php echo $login; ?></p>
                    </form>
                </div>
                <div class="card-footer text-muted">
                   
                </div>
            </div>
            </div>
            <div class="col-md-4">     
            </div>        
            </div>
           
        </div>
    </div>
  
  
        
      
    <!-- Bootstrap JavaScript Libraries -->
  <!--  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  -->
  </body>
</html>