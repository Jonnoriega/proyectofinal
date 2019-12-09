<!DOCTYPE html>
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

 </head>

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
            img{
                margin-left:43%;
            }
            h2{
                text-align:center;
            }-->
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

       





        if(isset($_GET["id"])){
            $id=$_GET["id"];
            
            $consulta="SELECT nombre,descripcion,precio,foto,color FROM articulos where id='$id'";
            $respuesta=mysqli_query($con,$consulta);
            $num_filas=mysqli_num_rows($respuesta);
            if($num_filas===0){
                echo "<h2>No hay articulos con este id</h2>";
            }else{
                $fila=mysqli_fetch_row($respuesta);
                $nombre=$fila[0];
                $descripcion=$fila[1];
                $precio=$fila[2];
                $foto=$fila[3];
				$color=$fila[4];
				echo "<div class='d-flex justify-content-center'>";
              echo "<div class='col-md-3'>";
                echo "<img align='center' src='images/$foto' class='img-fluid' alt='Responsive image'>";
				  echo "<h2 align='center'>$nombre $descripcion $color</h2>";
               
                echo "<h2 align='center'>$precio €</h2>";
				
                    
                    echo "<h2 align='center'><a href='articulos.php?id_compra=$id'>Meter al carrito</h2>";
               
                echo "<h2 align='center'><a href='articulos.php'>Volver al listado</h2> </div>";
echo"</div></div>";
                
            }
        }else{
            echo "<h2>No hay articulos con este id</h2>";
        }
            
            
        ?>
    </body>
</html>