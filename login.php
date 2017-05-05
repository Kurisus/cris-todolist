<?php
session_start(); //
?>
<?php require_once("includes/connection.php"); ?> <!-- incluye el archivo de la conexion a la base de datos-->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"  />
	<title>To do List ~ Kuri</title>
	<link href="css/estilos.css" media="screen" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
</head> 

<body>
 
<?php
 
if(isset($_SESSION["session_username"])){ //si session_usuario tiene valor, nos redirige a la pagina intropage.php, que da la bienvenida al usuario
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}
 
if(isset($_POST["login"])){ //recoge los valores del botón submit=login del formulario -- ESTE PHP SÓLO SE VA A EJECUTAR SI SE PULSA EL BOTON DE ENVIAR DEL FORMULARIO
 
	if(!empty($_POST['usuario']) && !empty($_POST['password'])) {
		 $usuario=$_POST['usuario'];
		 $password=$_POST['password'];
		 
		$query =mysql_query("SELECT * FROM usuario WHERE usuario='".$usuario."' AND password='".$password."'"); //consulta para ver si el usuario y el pass existen en la base de datos
		 
		$numrows=mysql_num_rows($query); //la funcion mysql_num_rows devuelve el numero de filas de la consulta
		 
		 if($numrows!=0){
			while($row=mysql_fetch_assoc($query)){ //recorremos todas las filas que nos devuelve la consulta y se queda con el ultimo resultado
				$dbusuario=$row['usuario'];
				$dbpassword=$row['password'];
				$iduser=$row['id_usuario'];
			}
			if($usuario == $dbusuario && $password == $dbpassword){ //comprueba el usuario y la contraseña
		 
				$_SESSION['session_username']=$usuario; //mete el usuario en la variable session_usuario y lo redirige a la pagina de bienvenida
				$_SESSION['session_id']=$iduser;
				/* Redirect browser */
				header("Location: intropage.php");
			}
		}else {
		 
			$message = "Nombre de usuario ó contraseña inválida!"; // si no encuentra ninguna coincidencia en la base de datos muestra un mensaje de error
		}
	 
	} else {
		$message = "Todos los campos son requeridos!"; // si no se ha rellenado algun campo muestra este mensaje
	}
}
?>
 
 <div class="container mlogin">
	<div id="titulo">To Do List</div>
 	<div id="login">
 		<h1>Logueo</h1>
		<form name="loginform" id="loginform" action="" method="POST">
	 		<p>
	 			<label for="user_login">Nombre De Usuario<br />
	 			<input type="text" name="usuario" id="usuario" class="input" value="" size="20" /></label>
	 		</p>
	 		<p>
	 			<label for="user_pass">Contraseña<br />
	 			<input type="password" name="password" id="password" class="input" value="" size="20" /></label>
	 		</p>
	 		<p class="submit">
	 			<input type="submit" name="login" class="button" value="Entrar" />
	 		</p>
	 		<p class="regtext">No estas registrado? <a href="register.php">Registrate Aquí</a>!</p>
		</form>
	</div>
	</div>
</div>
 
	 





<footer></footer>	
</body>
</html>
 
 <?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>