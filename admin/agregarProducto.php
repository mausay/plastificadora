<?php
session_start();
	include "../conexion.php";
        //si la session existe contiguanos con admin si no salimos al index
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
	<script type="text/javascript" src="./js/jquery-1.10.2.js"></script>
	<script type="text/javascript"  src="./js/scripts.js"></script>
        <script>
        function validar()
            {
                if(!datos.nombre.value)
                {
                    alert ("Ingrese el Nombre PORFAVOR");
                    datos.nombre.focus();
                    return false;
                }
                if(!datos.descripcion.value)
                {
                    alert ("Ingrese la descripcion del producto PORFAVOR");
                    datos.descripcion.focus();
                    return false;
                }
                if(!datos.file.value)
                {
                    alert ("Suba una imagen PORFAVOR");
                    datos.file.focus();
                    return false;
                }
                if(!datos.precio.value)
                {
                    alert ("Ingrese el Nombre PORFAVOR");
                    datos.precio.focus();
                    return false;
                }
                if (isNaN(parseFloat (datos.precio.value)))
                {
                    alert("Esto no es un numero");
                    datos.precio.focus();
                    return false;
                }
        }
        </script>
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
	    <li><a href="#" class="selected">Agregar</a></li>
            <li><a href="./modificar.php">Modificar</a></li>
            <li><a href="./listarCliente.php" >Listar Clientes</a></li>
	    <li><a href="../login/cerrar.php">Salir</a></li>
	  </menu>
	</nav>

	<center><h1>Agregar un Nuevo Producto</h1></center>
        <form name="datos" action="verificarProducto.php" method = "post" enctype="multipart/form-data" onsubmit="return validar(this);">
		<fieldset>
		Nombre<br>
		<input type="text" name="nombre" placeholder="Nombre del Producto">
		</fieldset>
		<fieldset>
		Descripción<br>
		<input type="text" name="descripcion" placeholder="Descripcion del Producto">
		</fieldset>
		<fieldset>
		Imagen<br>
		<input type="file" name="file">
		</fieldset>
		<fieldset>
		Precio<br>
		<input type="text" name="precio" placeholder="Precio del producto">
		</fieldset>
		<input type="submit" name="accion" value="Enviar" class="aceptar">
	</form>	
	
		</form>
	</section>
</body>
</html>