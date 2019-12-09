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
        <a class="nav-link" href="Addmoviles.php">Añadir móvil</a>
      </li>
	   <li class="nav-item active">
        <a class="nav-link" href="ChangeMovil.php">Modificar móvil</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="UpdateProceso.php">Modificar estado de pedido</a>
      </li>
	  <li class="nav-item active">
        <a class="nav-link" href="borrarmovil.php">Borrar móvil</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="datosuser.php">Cambiar datos usuario</a>
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
        
        <br><br>
            
        
		 
        
         <div class="container justify-content-center">

       <table class="table text-center">
	    <thead>
    
      <th colspan="2"><h3>Panel del administrador</h3></th>
    </tr>
  </thead>
  
  <tbody>
    <tr>
     
      <td> <a href="Addmoviles.php"><p>
	<i class="far fa-calendar-plus fa-7x"></i><br/><br/>
	  Añadir móvil</p></a></td>
	  
      <td><a href="ChangeMovil.php"><p >
	  <i class="fas fa-calendar-day fa-7x"></i><br/><br/>
	  Modificar móvil</p></a></td>
     
    </tr>
	
	 <tr>
	 <td class="align-middle" colspan="2"><a href="UpdateProceso.php"><p align="center">
	  <i class="far fa-edit fa-7x"></i><br/><br/>
	 Modificar estado de pedido</p></a>
	 </td>
	 </tr>
	 
    <tr>
      
      <td> <a href="borrarmovil.php"><p >
	  <i class="far fa-calendar-times fa-7x"></i><br/><br/>
	  Borrar móvil</p></a></td>
	  
      <td> <a href="datosuser.php"><p >
	  <i class="fas fa-user-cog fa-7x"></i><br/><br/>
	  Modificar usuario</p></a></td>
      
    </tr>
	
	
    
  </tbody>
</table>
   </div>        

            
    </body>
	 <script  type="text/javascript" src="js/jquery-3.4.1.slim.min.js"></script>
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<script  type="text/javascript" src="js/popper.min.js"></script>
</html>