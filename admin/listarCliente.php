<?php
	session_start();
	include "../conexion.php";
        //obligado a q inicie session
	if(isset($_SESSION['usuario']))
        {
            
	}
        else
        {
		header("Location: ./index.php?Error=Acceso denegado");
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="./modificar.js"></script>
</head>
<body>
	<header>
		<img src="../imagenes/logo.png" id="logo">
		<a href="../carritodecompras.php" title="ver carrito de compras">
			<img src="../imagenes/carrito.png">
		</a>
	</header>
	<section>
		<nav class="menu2">
			<menu>
                            <li><a href="../admin.php">Inicio</a></li>
			<li><a href="../admin.php">Ultimas Compras</a></li>
	    		<li><a href="./agregarproducto.php" >Agregar</a></li>
	    		<li><a href="#" class="selected">Clientes</a></li>
                        <li><a href="registroAdmin.php" >Nuevo Admin</a></li>
	    		<li><a href="../login/cerrar.php">Salir</a></li>
			</menu>
		</nav>
            <center>
	<?php

     
            include '../conexion.php';
            $nivel=2;
            $sql="select *  from usuario where fk_tipo_usuario='$nivel' ";

            $res=  mysqli_query($cx, $sql);

             echo'<center><h1>Clientes de la Empresa</h1></center>';
            echo"<table border='4px' ><tr> <td> Nombre </td><td> Apellido </td><td> Cedula </td><td> Telefono </td><td> Direccion </td><td> Correo </td></tr>";
            while ($dato=  mysqli_fetch_array($res))
            {
                echo"<tr>";
                echo "<td> ".$dato['nombre']."</td> " ;
                echo "<td> ".$dato['apellido']."</td> " ;
                echo "<td> ".$dato['cedula']."</td> " ;
                echo "<td> ".$dato['telefono']."</td> " ;
                echo "<td> ".$dato['direccion']."</td> " ;
                echo "<td> ".$dato['correo']."</td> " ;
                echo"</tr>";
            }
            echo"</table>";
            ?>
         </center>
	</section>
</body>
</html>
  