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
      <link rel="stylesheet" href="./css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	  <script  type="text/javascript" src="./js/jquery-3.4.1.slim.min.js"></script>
<script  type="text/javascript" src="./js/bootstrap.min.js"></script>
<script  type="text/javascript" src="./js/popper.min.js"></script>
       <!-- <style>
            .cabecera{
                /*background-color: #f1f1f1;*/
                width: 100%;
                text-align: center;
                color: #747474;
                margin: auto;
                font-size: 30px;
                padding: 3px;
            }
            
            ul {
                  list-style-type: none;
                  margin: 0;
                  padding: 0;
                  overflow: hidden;
                  background-color: #333;
                
                
                }

                li {
                  float: left;
                    bottom: 0px;
                    
                }

                li a {
                  display: block;
                  color: white;
                  text-align: center;
                  padding: 14px 16px;
                  text-decoration: none;
                }

                li a:hover:not(.active) {
                  background-color: #111;
                }

                .active {
                  background-color: #4CAF50;
                }
            
			
			div.nav{
				margin: -10px;
                width: 100%;
				background-color:red;
                
			}
			
			
			.imagen{
                width: 40%;
                margin-left: 30%;
            }
			table{
                width: 100%;
                text-align: center;
				font-size: 20px;
                margin: auto;
                background-color: white;
                color: black;
                border-collapse: collapse;
            }
            td , th{
                border: 1px solid grey;
            }
            
            td{
                width:25%;
            }
            
            
            #nombre{
                margin-right:-32%;
                margin-left:30%;
            }
             #articulos{
                border-style:none;
                background-size:cover;
                width:100%;
                height:100px;
            }
			
			
         </style>-->
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
   

<div class="container w-100">

<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src="./images/iphonebaan.png"
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
    
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="./images/samban.jpg"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="./images/xiaoban.jpg"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

</div>

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

</html>