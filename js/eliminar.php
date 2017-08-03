<?php
session_start();
//si existiera algun producto en el carrito creamos arreglo nuevo
	$arreglo=$_SESSION['carrito'];
	for($i=0;$i<count($arreglo);$i++){
		if($arreglo[$i]['Id']!=$_POST['Id']){
			$datosNuevos[]=array(
				'Id'=>$arreglo[$i]['Id'],
				'Nombre'=>$arreglo[$i]['Nombre'],
				'Precio'=>$arreglo[$i]['Precio'],
				'Imagen'=>$arreglo[$i]['Imagen'],
				'Cantidad'=>$arreglo[$i]['Cantidad']
				);
		}
	}
	//e insertamos los datos nuevo en la seesion carrito 
        if(isset($datosNuevos))
            
        {
		$_SESSION['carrito']=$datosNuevos;
	}
        //si al eliminar el carrito queda en 0 cerramos la session
        else
        {
		unset($_SESSION['carrito']);
		echo '0';
	}
?>