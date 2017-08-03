<?php
    session_start();
    include './conexion.php';
    
    //si existe inicio de session o ya ha elegido algun prodcto seguimos con esta condicion
    if(isset($_SESSION['carrito']))
    {
        if(isset($_GET['id'])){     //condicion para q no de error al dar click en el carrito cuando tenga productos
            $arreglo=$_SESSION['carrito'];
            $encontro=FALSE;
            $numero=0;
            //buscar si a escojigo un producto
            for($i=0;$i<count($arreglo);$i++)
            {
                if($arreglo[$i]['Id']==$_GET['id'])
                {
                    $encontro=TRUE;
                    $numero=$i;
                }
            }
            //si encuentra creamos la siguiente condicion
            if($encontro==TRUE)
            {
                //sie es verdadero aumentamos +1 y agregamos a la variable de sesion
                $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
                $_SESSION['carrito']=$arreglo;
            }
            //para q se asome los productos seleccionados
            else
            {
                $nombre="";
                $precio=0;
                $imagen="";
                $re=("select * from productos where id=".$_GET['id']);
                $res=mysqli_query($cx,$re);
                while($f=  mysqli_fetch_array($res))
                {
                    $nombre=$f['nombre'];
                    $precio=$f['precio'];
                    $imagen=$f['imagen'];
                }
                //agregando nuevos productos al arreglo
                $datosNuevos=array('Id'=>$_GET['id']
                                ,'Nombre'=>$nombre
                                ,'Precio'=>$precio
                                ,'Imagen'=>$imagen
                                ,'Cantidad'=>1);
                array_push($arreglo, $datosNuevos);
                $_SESSION['carrito']=$arreglo;
            }
        }
    }
    //si no existe inicio de sesscion o no a elegido algun producto vamos por esta condicion
    else
    {
        if(isset($_GET['id']))
        {
            $nombre="";
            $precio=0;
            $imagen="";
            $re=("select * from productos where id=".$_GET['id']);
            $res=mysqli_query($cx,$re);
            while($f=  mysqli_fetch_array($res))
            {
                $nombre=$f['nombre'];
                $precio=$f['precio'];
                $imagen=$f['imagen'];
            }
            $arreglo[]=array('Id'=>$_GET['id']
                            ,'Nombre'=>$nombre
                            ,'Precio'=>$precio
                            ,'Imagen'=>$imagen
                            ,'Cantidad'=>1);
            $_SESSION['carrito']=$arreglo;
        }
    }
?>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
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
            <li><a href="#" class="selected">Carrito</a></li>
	  </menu>
    </nav>
        <?php
            //comprobar el estado del carrito vacio o lleno si esta lleno mostrara lo siguiente 
            $total=0;
            if(isset($_SESSION['carrito']))
            {
                $datos=$_SESSION['carrito'];
                $total=0;
                for($i=0;$i<count($datos);$i++)
                {
        ?>
                    <div class="producto">
                        <center>
                            <img src="./productos/<?php echo $datos[$i]['Imagen'];?>"><br>
                            <span><?php echo $datos[$i]['Nombre']; ?></span><br>
                            <span>Precio: <?php echo $datos[$i]['Precio']; ?></span><br>
                            <span>Cantidad: 
                                    <input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
                                    data-precio="<?php echo $datos[$i]['Precio']; ?>"
                                    data-id="<?php echo $datos[$i]['Id']; ?>"
                                    class="cantidad">
                            </span><br>
                            <span class="subtotal">Subtotal: <?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio']; ?></span><br>
                            <a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
                        </center>        
                    </div>
        <?php
            $total=($datos[$i]['Precio']*$datos[$i]['Cantidad']);      
                }
            }
            //si esta vacvio mostrara que el carrito esta vacio
            else
            {
                echo '<center><h2>El Carrito esta vacio</h2></center>';
            }
            echo '<center><h2 id="total">Total: '.$total.'</h2></center>';
            //Mostrar botton comprar solo cuando haya productos
            if($total!=0)
            {
                 if(isset($_SESSION['usuario']))
                {
                     echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>;';
                }
                else 
                {
                    echo '<center><h3>Debe iniciar session para realizar la compra</h3></center>';
                }
            }
        ?>
        <center><a href="index.php">Ver Catalogo</a></center>
    </section>
</body>
</html>