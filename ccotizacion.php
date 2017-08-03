<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include './conexion.php';
$nom=  isset($_POST['nom'])?$_POST['nom']:NULL;
$apell=  isset($_POST['ap'])?$_POST['ap']:NULL;
$ced=  isset($_POST['cd'])?$_POST['cd']:NULL;
$empr=  isset($_POST['em'])?$_POST['em']:NULL;
$cel=  isset($_POST['cl'])?$_POST['cl']:NULL;
$numhojas=  isset($_POST['numh'])?$_POST['numh']:NULL;
$largo=  isset($_POST['lar'])?$_POST['lar']:NULL;
$ancho=  isset($_POST['anc'])?$_POST['anc']:NULL;
         
 $in="insert into cotizar(nombre,apellido,cedula,empresa,celular,num_hojas,largo,ancho) value ('$nom','$apell','$ced','$empr','$cel','$numhojas','$largo','$ancho')";
 mysqli_query($cx, $in);
 echo "<script>alert('Se registro correctamente ')</script>";
 