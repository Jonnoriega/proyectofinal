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
        <a class="nav-link" href="articulos.php">Ver articulos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="carrito.php">Ver carrito</a>
      </li>
	   <li class="nav-item active">
        <a class="nav-link" href="updatepro.php">Pedidos</a>
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



      <?php
         if(isset($_POST['update'])) {
			 require("funcionConexion.php");
                $con=conexion("tienda");
			    
			
            if(!$con ) {
               die('Could not connect: ' . mysqli_error());
            }
            
            $id = $_POST['id'];
			$estado = $_POST['estado'];
            
			
            $consulta = "UPDATE compras SET Estado = '$estado' WHERE id_articulo = '$id'" ;
			$respuesta=mysqli_query($con,$consulta);
            
            
            
            header("Location: UpdateProceso.php");
            
            mysqli_close($con);
         }else 
			
		 
		 {
            ?>
			<?php
			
			
			require("funcionConexion.php");
                $con=conexion("tienda");
			$consulta="SELECT articulos.nombre, articulos.descripcion, articulos.precio, articulos.color, compras.Estado  FROM compras LEFT JOIN articulos ON compras.id_articulo = articulos.id WHERE compras.id_cliente=".$_SESSION['usuario']['id'].";";
			
			
			$respuesta=mysqli_query($con,$consulta);
            
			
			
			

				echo "
				<br/>
				
				<table class='table table-striped'>
  <thead>
    <tr>
      <th >Marcas</th>
      <th >Modelo</th>
	  <th >Color</th>
      <th >Precio</th>
      <th >Estado</th>
    </tr>
  </thead>";
				
				while($row  = mysqli_fetch_array($respuesta))
				{
				echo "<tr>";
				echo "<td>" . $row[0] . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "<td>" . $row[3] . "</td>";
				echo "<td>" . $row[2] . "€</td>";
				echo "<td>" . $row[4] . "</td>";
				
				echo "</tr>";
				}
			echo "</table>";
			
			?>
			
			<div id="mover">
               
			   
			   </div>
            <?php
         }
      ?>
      
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
    </body>
	 <script  type="text/javascript" src="js/jquery-3.4.1.slim.min.js"></script>
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<script  type="text/javascript" src="js/popper.min.js"></script>
</html>