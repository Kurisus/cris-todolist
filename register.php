<?php require_once("includes/connection.php"); ?> <!-- incluimos la conexion a la base de datos -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Inicio de sesión</title>
	<link href="css/estilos.css" media="screen" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head> 

<body>
 
<?php
 
if(isset($_POST["register"])){ //esto sólo se ejecuta si hemos pulsado el boton del formulario de registro
 
	if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['email'])) {
	 $usuario=$_POST['usuario'];
	 $password=$_POST['password'];
	 $email=$_POST['email'];
	 
	 $query=mysql_query("SELECT * FROM usuario WHERE usuario='".$usuario."'");
	 $numrows=mysql_num_rows($query); //guardamos las filas que devuelve la consulta
	 
		if($numrows==0){// si el resultado de la consulta es 0, guardamos el usuario en la base de datos
			 $sql="INSERT INTO usuario
			 (usuario, password, email)
			 VALUES('$usuario','$password', '$email')";
			 
			$result=mysql_query($sql); //guardamos los datos en la variable result
	 
			if($result){ //comprobamos si en la variable result hay datos
				$message = "Cuenta Correctamente Creada"; //y mostramos el mensaje de que se ha creado la cuenta
			} else {
				$message = "Error al ingresar datos de la informacion!"; //si hay algun error mostramos este mensaje
			}
	 
		} else {
			$message = "El nombre de usuario ya existe! Por favor, intenta con otro!"; //este mensaje lo mostramos si el nombre de usuario ya existe (es clave única en la base de datos)
		}
	 
	} else {
	 $message = "Todos los campos no deben de estar vacios!"; //si no se han rellenado todos los campos del formulario mostramos este mensaje
	}
}
?>
 
<?php if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} ?>
 
<div class="container mregister">
 <div id="login">
 <h1>Registrar</h1>
<form name="registerform" id="registerform" action="register.php" method="post">
 <p>
 <label for="user_login">Nombre de Usuario<br />
 <input type="text" name="usuario" id="usuario" class="input" size="32" value="" /></label>
 </p>

 <p>
 <label for="user_pass">Password<br />
 <input type="password" name="password" id="password" class="input" value="" size="32" /></label>
 </p>
 
 <p>
 <label for="user_pass">E-mail<br />
 <input type="email" name="email" id="email" class="input" value="" size="32" /></label>
 </p>
 
<p class="submit">
 <input type="submit" name="register" id="register" class="button" value="Registrar" />
 </p>
 
 <p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
</form>
 
 </div>
 </div>
 
	<footer></footer>	
</body>
</html>