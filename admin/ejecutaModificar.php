<?php 
	include "../conexion.php";
	if($_POST['Caso']=="Eliminar"){
		$borar=("delete from productos where id=".$_POST['Id']);
                mysqli_query($cx,$borar);
                
		//unlink( "../productos".$_POST['Imagen']);
		echo 'El producto se ha eliminado';
	}
	if($_POST['Caso']=="Modificar"){
		$actualizar=("update productos set nombre='".$_POST['Nombre']."' where id=".$_POST['Id']);
		$actualizar=("update productos set descripcion='".$_POST['Descripcion']."' where id=".$_POST['Id']);
		$actualizar=("update productos set precio='".$_POST['Precio']."' where id=".$_POST['Id']);
                mysqli_query($cx,$actualizar);
		echo 'El producto se ha modificado';
	}

?>