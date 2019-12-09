
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
      <li class="nav-item active">
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
       
		

        

        </form> 

    </body>
</html>



<form action="registrar1.php" method="post"> 


 <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-5 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Crear cuenta :</h5>
            <form class="form-signin">
              <div class="form-label-group">
			
              <div class="form-label-group">
			  <label for="inputPassword">Nombre</label>
                <input type="text" name="username"  id = "nombre" class="form-control" placeholder="nombre" required>
                
              </div>
			  
 <div class="form-label-group">
			  <label for="inputPassword">Email</label>
                <input type="email" name="email"  id = "precio" class="form-control"  placeholder="ejemplo@dominio.com" required>
                
              </div>			 

			 <div class="form-label-group">
			  <label for="inputPassword">Contraseña</label>
                <input type="password" name="password" id = "precio" class="form-control" placeholder="Contraseña" required>
                
              </div>
			  
			 
			  
			   
<br/>
              <input type="submit" name="submit" value="Registrarme">

 <input type="reset" name="clear" value="Limpiar campos">
			  <br/><a class="text-danger">*Hay que rellenar todos los campos<a/>
              
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

 
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
