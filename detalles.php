<?php
session_start();
?>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
	<script type="text/javascript"  src="./js/scripts.js"></script>
</head>
<body>
	<header>
                <img src="./imagenes/logo.png" id="logo">
	</header>
       <?php
        include "./conexion.php";
        if(isset($_SESSION['usuario']))
        {
              echo'<h4 align="right" >Bienvenido '.$_SESSION['nombre'].' '.$_SESSION['apellido'].'</h4>';
	}
       ?>
	<section>
        <nav class="menu2">
	  <menu>
              <li><a href="index.html">Inicio</a></li>
            <li><a href="index.php">Tienda</a></li>
            <li><a href="#" class="selected">Detalle del producto</a></li>
            <?php
            if(isset($_SESSION['usuario']))
            {
                echo '<li><a href="./login/cerrar.php" >Cerrar Sesión</a></li>';
            }
            else 
            {
                echo '<li><a href="login.php" >Iniciar Sesión</a></li>';
                echo '<li><a href="registrar.php" >Registrar</a></li>';
            }
            ?>
            <li><a href="carritodecompra.php" >Ver Carrito</a></li>
	  </menu>
	</nav>    
		
	<?php
		include './conexion.php';
		$re="select *from productos where id=".$_GET['id'];
		$res=mysqli_query($cx,$re);
                while ($f=mysqli_fetch_array($res)) {
		?>
			<center>
				<img src="./productos/<?php echo $f['imagen'];?>"><br>
				<span><?php echo $f['nombre'];?></span><br>
                                <span>Precio: <?php echo $f['precio'];?></span><br>
                                <span>Descripcion: <?php echo $f['descripcion'];?></span><br>
				<a href="./carritodecompra.php?id=<?php echo $f['id'];?>">Añadir al Carrito</a>
                                <br>
                                <br>
			</center>

	<?php
		}
	?>
		
		

		
	</section>
</body>
</html>