<!DOCTYPE html>
   <?php
            session_start();
            if(isset($_GET["salir"])){
                session_destroy();
                header("Location: index.php");
            }
          
            ?>
<html>
    <head>
        <title>mobile-centre</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <style>
            
        </style>
    </head>
	
	      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <img src="./images/logoweb.png" style="width:200px;height:100px;" />
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      
    </ul>
	<form action="#" method="get">
   <?php
                if(isset($_SESSION["usuario"])){
                    $nombre=$_SESSION["usuario"]["nombre"];
                    echo "<h3 class='text-primary' id='nombre'>$nombre</h3>";
                }
            ?>
  </form>
  </div>
  
  
</nav>
    <body>
       
        <form action="#" method="POST">
          <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Iniciar sesión</h5>
            <form class="form-signin">
              <div class="form-label-group">
			  <label for="inputEmail">Dirección de e-mail</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="ejemplo@dominio.com" required autofocus>
                
              </div>

              <div class="form-label-group">
			  <label for="inputPassword">Contraseña</label>
                <input type="password" id="inputPassword" class="form-control" name="contrasena" placeholder="Contraseña" required>
                
              </div>
<br/>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="entrar" type="submit">Entrar</button>
			  <a href="registrar.php"><p >
	  
	 registrarse</p></a>
              
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
                <?php
                if(isset($_POST["entrar"])){
                    $email=$_POST["email"];
                    $erroresValidacion="";
                    $contrasena=$_POST["contrasena"];
                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
					
										
                      if (!filter_var($email, FILTER_VALIDATE_EMAIL) === true) {
						  //es incorrecto el email
                        $erroresValidacion="  <p>Error de validacion del email</p>";
					}
                          
                          
                    
                   
                    if($erroresValidacion===""){
                        require("funcionConexion.php");
                        $con=conexion("tienda");
                        $consulta="select id,nombre,hashpass from clientes where email='$email'";
                        $respuesta=mysqli_query($con,$consulta)or die("Error consulta");
                        $fila=mysqli_fetch_row($respuesta);
                        $id=$fila[0];
                        $nombre=$fila[1];
                        $hash=$fila[2];
                        if(password_verify($contrasena,$hash)){
                            $usuario=array("id"=>$id,"nombre"=>$nombre);
                            $_SESSION["usuario"]=$usuario;
                            $_SESSION["compras"]=array();
                            if($nombre === "admin" ){
                                header("Location:homeadmin");
                            }else{
                            header("Location: articulos.php");
                            }
                        }else{
                            echo "<p>Los datitos no son correctos</p>";
                        }
                            
                        
                            
                        }else{
                        echo $erroresValidacion;
                    }
                     
                        }
                    
                    
                    
				
                
                    
                ?>

        </form> 
		

<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

  

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">MOBILE-CENTRE</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Somos una empresa joven, pero a su vez puntera en su sector. Nuestro mayor objetivo
		es satisfacer la necesidad de nuestros clientes.</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
    
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contacto</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> Alcorcón, 28922 </p>
        <p>
          <i class="fas fa-envelope mr-3"></i> info@example.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i>  912 345 678</p>
        <p>
          <i class="fas fa-print mr-3"></i> 912 345 777</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2018 Copyright:
    <a > mobile-centre</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

 
    </body>
	 <script  type="text/javascript" src="js/jquery-3.4.1.slim.min.js"></script>
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<script  type="text/javascript" src="js/popper.min.js"></script>
</html>