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
     <style>
            
          
               
			
			
			
		
			table{
                width: 100%;
                text-align: center;
				font-size: 20px;
                margin: auto;
                background-color: white;
                color: black;
                border-collapse: collapse;
            }
          
 
             #articulos{
                border-style:none;
                background-size:cover;
                width:100%;
                height:490px;
            }
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
        <a class="nav-link" href="articulos.php">Ver articulos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="carrito.php">Ver carrito</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="?salir=salir">Salir</a>
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
       <h2 align="center">Los mejores moviles están en MOBILE-CENTRE</h2>
        
         
			
			 <form action="detalle.php" method="get">
			<?php
                require("funcionConexion.php");
                $con=conexion("tienda");
                if(isset($_GET["id_compra"])){
                    $id=$_GET["id_compra"];
                    $consulta="SELECT nombre,precio from articulos where id='$id'";
                    $respuesta=mysqli_query($con,$consulta);
                    $fila=mysqli_fetch_row($respuesta);
                    $nombre_articulo=$fila[0];
                    $precio=$fila[1];
                    $compra=array("id"=>$id,"nombre"=>$nombre_articulo,"precio"=>$precio);
                    if(!isset($_SESSION["compras"])){
                        $_SESSION["compras"]=array();
                    }
                    $repetido=false;
                    for($k=0;$k<count($_SESSION["compras"]);$k++){
                        if($id===$_SESSION["compras"][$k]["id"])
                            $repetido=true;
                    }
                    if($repetido===false)
                        array_push($_SESSION["compras"],$compra);
                    
                    
                    
                }
                
                $consulta="SELECT id,nombre,descripcion,precio,foto FROM articulos";
                $respuesta=mysqli_query($con,$consulta);
			
			 echo "<table class='table'>
		 <tbody>";
			 
					$z=0;
					echo"<tr>";
			  while($fila=mysqli_fetch_row($respuesta)){
                   $z++;
                    
                        echo "<td><input type='submit' id='articulos' name='id' value='$fila[0]' style='font-size:0px;background-image:url(\"images/$fila[4]\")'><br/>
                        $fila[1] $fila[2]<br/>
                        Precio:$fila[3]€<br/>
                        
                        </td>";
						
						

                        if($z==3){
						echo "</tr><tr>";
						$z=0;
						}
						
                        //echo "<form action='detalle.php' method='GET'>";
			 }echo"</tr>";
			
  
 

 echo" </tbody></table>";
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