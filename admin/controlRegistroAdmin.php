<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
include '../conexion.php';
$nom=  isset($_POST['nom'])?$_POST['nom']:NULL;
$ap=  isset($_POST['ap'])?$_POST['ap']:NULL;
$ci=  isset($_POST['ci'])?$_POST['ci']:NULL;
$usuario=  isset($_POST['usuario'])?$_POST['usuario']:NULL;
$dirc=  isset($_POST['dirc'])?$_POST['dirc']:NULL;
$tlf=  isset($_POST['tlf'])?$_POST['tlf']:NULL;
$cr=  isset($_POST['cr'])?$_POST['cr']:NULL;
$pw=  md5(isset($_POST['pw'])?$_POST['pw']:NULL);
$nivel=1;

$sql="select * from usuario where cedula='$ci';";
 
$res=  mysqli_query($cx, $sql);
$cont=  mysqli_num_rows($res);
if($cont>0)
{
   echo "<script>alert('El Administrador ya se encuentra registrado')</script>";
   header("refresh:0;url=http://localhost/proyect/admin/registroAdmin.php");
}

else
{
    $in="insert into usuario(nombre,apellido,cedula,usuario,direccion,telefono,correo,pw,fk_tipo_usuario) value ('$nom','$ap','$ci','$usuario','$dirc','$tlf','$cr','$pw','$nivel')";
    mysqli_query($cx, $in);
    echo "<script>alert('Registro Exitoso')</script>";
    header("refresh:0;url=http://localhost/proyect/admin.php");
}
?>