
<?php
session_start();
include "../conexion.php";
 if(isset($_SESSION['fk_tipo_usuario'])==2)
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
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript"  src="../js/scripts.js"></script>
</head>
<body>
	
    <header>
            <img src="../imagenes/logo.png" id="logo">
            
    </header>
        
    <?php
        if(isset($_SESSION['usuario']))
        {
              echo'<h4 align="right" >Bienvenido '.$_SESSION['nombre'].' '.$_SESSION['apellido'].'</h4>';
	}
    ?>
    <br>    
	<section>
         <nav class="menu2">
	  <menu>
            <li><a href="../login/cerrar.php" >Cerrar Sesión</a></li>
	  </menu>
	</nav>
<?php

//insertar las compras realizadas por el usuario 		
$arreglo=$_SESSION['carrito'];
		$numeroventa=0;
		$re="select * from compras order by numeroventa DESC limit 1";
                $res=mysqli_query($cx,$re);
		while (	$f=mysqli_fetch_array($res)) 
                {
                    $numeroventa=$f['numeroventa'];	
		}
		if($numeroventa==0)
                {
                    $numeroventa=1;
		}
                else
                {
                    $numeroventa=$numeroventa+1;
		}
		for($i=0; $i<count($arreglo);$i++)
                {
                    $in=("insert into compras (numeroventa, nombre,imagen,precio,cantidad,subtotal) values(
				".$numeroventa.",
				'".$arreglo[$i]['Nombre']."',
				'".$arreglo[$i]['Imagen']."',	
				'".$arreglo[$i]['Precio']."',
				'".$arreglo[$i]['Cantidad']."',
				'".($arreglo[$i]['Precio']*$arreglo[$i]['Cantidad'])."')");
                    mysqli_query($cx,$in);
		}
		unset($_SESSION['carrito']);
		//mandar a la paquina del admin
               // header("Location: ../admin.php");
    //correo
$total=0;
$tabla='<table border="1">
<tr>
<th>Nombre</th>
<th>Cantidad</th>+
<th>Precio</th>
<th>Subtotal</th>
</tr>';
for($i=0;$i<count($arreglo);$i++)
{
    $tabla=$tabla.'<tr>
    <td>'.$arreglo[$i]['Nombre'].'</td>
    <td>'.$arreglo[$i]['Cantidad'].'</td>
    <td>'.$arreglo[$i]['Precio'].'</td>
    <td>'.$arreglo[$i]['Cantidad']*$arreglo[$i]['Precio'].'</td>
    </tr>
    ';
    $total=$total+($arreglo[$i]['Cantidad']*$arreglo[$i]['Precio']);
}
$tabla=$tabla.'</table>';



$nombre=$_SESSION['nombre'];
$fecha=date("d-m-Y");
$hora=date("H:i:s");
$asunto="Compra en PlatificadoraYucta";
$desde="www.plastificadorayucta.com";
$correo=$_SESSION['correo'];
$comentario='
<div style="
border:1px solid #d6d2d2;
border-radius:5px;
padding:10px;
width:800px;
heigth:300px;
">
<center>
    <img src="../imagenes/logo.png" width="300px" heigth="250px">
    <h1>Muchas gracias por comprar en mi tienda</h1>
</center>
    <p>Hola '.$nombre.' muchas gracias por comprar hemos enviado el detalle de su compra al correo electronico</p>
    <p>'.$tabla.'</p>
    <p> <br> El total de su compra es: '.$total.'</p>
    <p>Fue un placer servirle<br>
    </p>
    </div>

    ';
//echo $tabla;
echo $comentario;
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf8\r\n";
$headers.="From: Remitente\r\n";
mail($correo,$asunto,$comentario,$headers);

?>
	
	</section>
</body>
</html>
