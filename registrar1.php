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
       
		<?php

 $host_db = "localhost";

 $user_db = "root";

 $pass_db = "";

 $db_name = "tienda";

 $tbl_name = "clientes";

  

 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 

 if ($conexion->connect_error) {

 die("La conexion falló: " . $conexion->connect_error);

}

 

 $buscarUsuario = "SELECT * FROM $tbl_name WHERE nombre = '$_POST[username]' ";
 $buscarEmail = "SELECT * FROM $tbl_name WHERE email = '$_POST[email]' ";
 

 $result = $conexion->query($buscarUsuario);
 
 $result1 = $conexion->query($buscarEmail);

 

 $count = mysqli_num_rows($result);
$count1 = mysqli_num_rows($result1);
 

 if ($count == 1) {

 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";

 

 echo "<a href='registrar.php'>Por favor escoga otro Nombre</a>";

 }
 
 else if ($count1 == 1) {
	 echo "<br />". "El Email ya a sido tomado." . "<br />";

 

 echo "<a href='registrar.php'>Por favor escoga otro Email</a>";
	 
 }

 else{

 

 $form_pass = $_POST['password'];
 $email = $_POST['email'];

  

 $hash = password_hash($form_pass, PASSWORD_BCRYPT);

 

 $query = "INSERT INTO clientes (nombre, email , hashpass) VALUES ('$_POST[username]','$_POST[email]', '$hash')";

 

 if ($conexion->query($query) === TRUE) {

  

 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";

 echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";

 echo "<h5>" . "Hacer Login: " . "<a href='login.php'>Login</a>" . "</h5>";

 }

 

 else {

 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error;

   }

 }
 
 
 

 mysqli_close($conexion);

?>

        

        </form> 

    </body>
	 <script  type="text/javascript" src="js/jquery-3.4.1.slim.min.js"></script>
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<script  type="text/javascript" src="js/popper.min.js"></script>
</html>


























