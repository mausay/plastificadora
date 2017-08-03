<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Registrarse</title>
	<link rel="stylesheet" type="text/css" href="./css/estilos.css">

	<script>
            function validar()
            {
                if(!datos.nom.value)
                {
                    alert ("Ingrese el Nombre PORFAVOR");
                    datos.nom.focus();
                    return false;
                }
                if(!datos.ap.value)
                {
                    alert ("Ingrese el Apellido PORFAVOR");
                    datos.ap.focus();
                    return false;
                }
                if(!datos.ci.value)
                {
                    alert ("Debe Ingresar su cedula");
                    datos.ci.focus();
                    return false;
                }
                else
                {
                    if(!/^[0-9]{10}$/.test(datos.ci.value))
                    {
                        alert ("Ingresa una cedula valida");
                        datos.ci.focus();
                        return false;
                    }
                }
                if(!datos.usuario.value)
                {
                    alert ("Debe Ingresar el nombre del Usuario");
                    datos.usuario.focus();
                    return false;
                }
                if(!datos.dirc.value)
                {
                    alert ("Debe Ingresar su Dirección");
                    datos.dirc.focus();
                    return false;
                }
                if(!datos.tlf.value)
                {
                    alert ("Debe Ingresar su telefono");
                    datos.tlf.focus();
                    return false;
                }
                if(!datos.cr.value)
                {
                    alert ("El Correo es un dato requerido");
                    datos.cr.focus();
                    return false;
                }
                else
                {
                    if(!/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/.test(datos.cr.value))
                    {
                        alert ("El correo es invalido");
                        datos.cr.focus();
                        return false;
                    }
                }
                if(!datos.pw.value)
                {
                    alert ("Debe Ingresar una contraseña");
                    datos.pw.focus();
                    return false;
                }
                if(!datos.pw1.value)
                {
                    alert ("Debe Confirmar su contraseña");
                    datos.pw1.focus();
                    return false;
                }
                if(datos.pw1.value!=datos.pw.value)
                {
                    alert ("Las Contraseñas no coinciden");
                    datos.pw.focus();
                    return false;
                }
                
            }
        </script>
</head>
<body>
	<header>
		<img src="./imagenes/logo.png" id="logo">
	</header>
	<section>
        <nav class="menu2">
	  <menu>
              <li><a href="index.html">Inicio</a></li>
            <li><a href="index.php">Tienda</a></li>
            <li><a href="login.php" >Iniciar Sesion</a></li>
            <li><a href="#" class="selected" >Registrar</a></li>
            
	  </menu>
	</nav>
            <center><h3>Registro de usuario</h3></center>
            <form name="datos"  id="formulario" method="POST" action="./login/controlRegistro.php" onsubmit="return validar(this);" >
                
		<label for="usuario">Nombre</label><br>
		<input type="text"  name="nom" placeholder="Ingrese su Nombre" ><br>
                <label for="apellido">Apellido</label><br>
		<input type="text"  name="ap" placeholder="Ingrese su Apellido" ><br>
                <label for="cedula">Cedula</label><br>
		<input type="text"  name="ci" placeholder="Ingrese cedula de identidad" ><br>
                <label for="usuario">Usuario</label><br>
		<input type="text"  name="usuario" placeholder="Ingrese el usuario ejm: sander" ><br>
                <label for="direccion">Dirección</label><br>
		<input type="text"  name="dirc" placeholder="Direccion de su domicilio" ><br>
                <label for="telefono">Telefono</label><br>
		<input type="text"  name="tlf" placeholder="Numero convencional o celular" ><br>
                <label for="correo">Correo</label><br>
		<input type="text"  name="cr" placeholder="Su Direccion de correo electronico" ><br>
		<label for="pw">Contraseña</label><br>
		<input type="password"  name="pw" placeholder="Ingrese la contraseña" ><br>
                <label for="pw1">Confirmar Contraseña</label><br>
		<input type="password"  name="pw1" placeholder="Repita la contraseña" ><br>
                <input type="submit" name="Registrar" value="Registrar" class="aceptar">
	</form>
	</section>
</body>
</html>

