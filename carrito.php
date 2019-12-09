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
            .cabecera{
                /*background-color: #f1f1f1;*/
                width: 100%;
                text-align: center;
                color: #747474;
                margin: auto;
                font-size: 30px;
                padding: 3px;
            }
            .barra{
                width: 100%;
                text-align: center;
                background-color: #747474;
                padding: 3px;
            }
            .barra a{
                color: white;
                font-size: 20px;
                text-decoration: none;
                margin-right: 5px;
                padding: 2px;
            }
            .barra a:hover{
                background-color: #A9A9A9;
                color: white;
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
            #nombre{
                margin-right:-32%;
                margin-left:30%;
            }
            h3,h2{
                text-align:center;
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
        require("funcionConexion.php");
        $con=conexion("tienda");
        if(isset($_GET["comprar"])){
            $articulos_comprados=$_SESSION["compras"];
            for($f=0;$f<count($articulos_comprados);$f++){
            $id_usuario=$_SESSION["usuario"]["id"];
            $id_articulo=$articulos_comprados[$f]["id"];
            $consulta="INSERT INTO compras (id_cliente,id_articulo) VALUES ('$id_usuario','$id_articulo')";
            $respuesta=mysqli_query($con,$consulta);
            $consulta2="UPDATE articulos SET disponible = 'N' WHERE `articulos`.`id` = $id_articulo;";
            $respuesta2=mysqli_query($con,$consulta2);
            unset($_SESSION["compras"]);
            }
            
            
            
        }else if(isset($_GET["vaciar"])){
            unset($_SESSION["compras"]);


        }
        
            if(isset($_SESSION["compras"])){
                if(count($_SESSION["compras"])!=0){
                    ?>
					<br/>
                <table class="table">
                <tr>
                    <th>ID</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
					<th>COLOR</th>
                    <th>PRECIO</th>
					
            </tr>
                
                <?php
                $articulos_comprados=$_SESSION["compras"];
                
                $dinero=0;
                //echo "<pre>".print_r($articulos_comprados)."</pre>";
                for($f=0;$f<count($articulos_comprados);$f++){
                    echo "<tr>";
                    $id=$articulos_comprados[$f]["id"];
                    $consulta="SELECT nombre, descripcion, precio, color from articulos where id='$id'";
                    $respuesta=mysqli_query($con,$consulta);
                    $fila=mysqli_fetch_row($respuesta);
                    $descripcion=$fila[1];
                    echo "<td>".$id."</td>";
                    echo "<td>".$fila[0]."</td>";
                    echo "<td>".$descripcion."</td>";
					echo "<td>".$fila[3]."</td>";
                    echo "<td>".$fila[2]."€</td>";
					
                    echo "</tr>";
                    $dinero=$dinero+$articulos_comprados[$f]["precio"];
                }



                echo "</table>";
                echo "<h2>Total del carrito = $dinero €</h2>";
                echo "<h3><a href='carrito.php?comprar=comprar'>Comprar</a></h3>";
                echo "<h3><a href='carrito.php?vaciar=vaciar'>Vaciar carrito</a></h3>";
                }else{
                    echo "<h3>No hay ningún articulo en el carrito</h3>";
                }
                
            }else{
                
				echo "<h3>Se ha efectuado la compra</h3>";
            }
        ?> 
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
    </body>
	 <script  type="text/javascript" src="js/jquery-3.4.1.slim.min.js"></script>
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<script  type="text/javascript" src="js/popper.min.js"></script>
</html>