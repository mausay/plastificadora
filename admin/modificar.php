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
	    		<li><a href="#" class="selected">Modificar</a></li>
                        <li><a href="./listarCliente.php" >Listar Clientes</a></li>
	    		<li><a href="../login/cerrar.php">Salir</a></li>
			</menu>
		</nav>
            <br>
		<h1>MODIFICAR Y/O ELIMINAR</h1>
		<table width="100%">
			<tr>
				<td>Id</td>
				<td>Nombre</td>
				<td>Descripcion</td>
				<td>Precio</td>
				<td>Eliminar</td>
				<td>Modificar</td>
			</tr>
		<?php 
			$resultado="select * from productos";
                        $res=mysqli_query($cx,$resultado);
			while($row=mysqli_fetch_array($res))
                        {
			//ingresamos a la base de datos para mostrar dependiendo q puesto esta  en el arrary	
                            echo '
				<tr>
					<td>
						<input type="hidden"  value="'.$row[0].'">'.$row[0].'
						<input type="hidden" class="imagen" value="'.$row[3].'">
					</td>
					<td><input type="text" class="nombre" value="'.$row[1].'"></td>
					<td><input type="text" class="descripcion" value="'.$row[2].'"></td>
					<td><input type="text" class="precio" value="'.$row[4].'"></td>
					<td><button class="eliminar" data-id="'.$row[0].'">Eliminar</button></td>
					<td><button class="modificar" data-id="'.$row[0].'">Modificar</button></td>
				</tr>
				';
			}
		?>
	</table>
	</section>
</body>
</html>