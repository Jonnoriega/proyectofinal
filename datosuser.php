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
        <a class="nav-link" href="homeadmin.php">Panel del admin</a>
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
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
			
            $consulta = "UPDATE clientes SET nombre = '$nombre', email='$email' WHERE id = '$id'" ;
			$respuesta=mysqli_query($con,$consulta);
            
            mysqli_close($con);
            
            header("Location: datosuser.php");
            
            
         }else 
			
		 
		 {
            ?>
			<?php
			
			
			require("funcionConexion.php");
                $con=conexion("tienda");
			$consulta="SELECT * FROM clientes";
			$respuesta=mysqli_query($con,$consulta);
            
			
			
			

				echo "<table border='1'>
				<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				</tr>";
				
				while($row = mysqli_fetch_array($respuesta))
				{
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['nombre'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "</tr>";
				}
			echo "</table>";
			
			?>
			
			
			
			<div id="mover">
               <form method = "post" action = "<?php $_PHP_SELF ?>">
			   <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-5 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Modificar datos usuario :</h5>
            <form class="form-signin">
			<div class="form-label-group">
			  <label for="inputEmail">Buscar usuario por id</label>
                <input name = "id" type = "id" id = "id" class="form-control w-25"  placeholder="id" required autofocus>
              </div>
			  <hr>
              <div class="form-label-group">
			  <label for="inputEmail">Nombre</label>
                <input name = "nombre" type = "text" id = "nombre" class="form-control"  placeholder="nombre" required autofocus>
                
              </div>

              <div class="form-label-group">
			  <label for="inputPassword">e-mail</label>
                <input name = "email" type = "email" id = "email" class="form-control" placeholder="ejemplo@dominio.com" required>
                
              </div>
			  
			  
			  
			  
			  
			   
<br/>
                <input name = "update" type = "submit"  value = "Modificar" >
				<br/><a class="text-danger">*No se puede repetir e-mail<a/>
			  <br/><a class="text-danger">*Hay que rellenar todos los campos<a/>
              
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
			   
			   
						
               </form>
			   
			   </div>
            <?php
         }
      ?>
      
   </body>
    <script  type="text/javascript" src="js/jquery-3.4.1.slim.min.js"></script>
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<script  type="text/javascript" src="js/popper.min.js"></script>
</html>