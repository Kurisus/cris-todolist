<?php 
	session_start();
	require_once("includes/connection.php"); 
	if(!isset($_SESSION["session_username"])) { //esto comprueba que en la variable $_SESSION no haya ninguna sesion abierta (ningun usuario logado) si no encuentra nada nos redirige a la pagina de login.php
		header("location:login.php");
	} 
		
?> <!-- incluimos la conexion a la base de datos -->

<?php include ('cabecera.php');?> 
<?php include ('menulistas.php');?> 

<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8"  />
		<title>To do List ~ Kuri</title>
		<link href="css/estilos.css" media="screen" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	</head> 

	<body>
	
	<?php
	
		if(isset($_POST["edit"])){ //esto sólo se ejecuta si hemos pulsado el boton del formulario de registro

			if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['email'])) {
				$usuario=$_POST['usuario'];
				$password=$_POST['password'];
				$email=$_POST['email'];
				
				$query=mysql_query("SELECT * FROM usuario WHERE usuario='".$usuario."' AND id_usuario<>".$_SESSION['session_id']);
				//echo $query;
				$numrows=mysql_num_rows($query); //guardamos las filas que devuelve la consulta
														
				if($numrows==0){ //UPDATE
 					$sql="UPDATE usuario SET usuario='".$usuario."', password='".$password."', email='".$email."' WHERE id_usuario=".$_SESSION['session_id'];
 					//echo $sql;
					$result=mysql_query($sql);
 					$_SESSION['session_username']=$usuario;
					echo $_SESSION['session_username'];
 					if($result){
 						$message = "Datos modificados con éxito";
 					} else {
 						$message = "Error al modificar los datos";
					}
 
				} else {
						 $message = "Ese nombre de usuario ya existe, por favor, escribe otro";
 				}
 
			} else {
 				$message = "No se puede actualizar porque hay datos en blanco";
			}
		}

			$datosUsuario="SELECT * FROM usuario WHERE usuario='".$_SESSION['session_username']."'";
			$result = mysql_query($datosUsuario);
			$row = mysql_fetch_assoc($result);

?>
 
	
	
	<!--</div>

	
		<div class="container mregister">-->
			<div id="login">
				<h1>Editar mis Datos</h1>
				<form name="editform" id="editform" action="edituser.php" method="post">
					<p>
						<label for="user_login">Nombre de Usuario<br />
						<input type="text" name="usuario" id="usuario" class="input" size="32" value="" placeholder="<?php echo $row['usuario']; ?>"/></label>
					</p>	
					<p>
						<label for="user_pass">Contraseña<br />
						<input type="password" name="password" id="password" class="input" size="32" value="" placeholder="<?php echo $row['password']; ?>"/></label>
					</p>
					<p>
						<label for="user_mail">E-mail<br />
						<input type="email" name="email" id="email" class="input" size="32" value="" placeholder="<?php echo $row['email']; ?>"/></label>
					</p>
					 
					<p class="submit">
						<label><a href="intropage.php"><-- Volver</a></label>
						<input type="submit" name="edit" id="edit" class="button" value="Editar" />
					</p>
				<!-- <p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>-->
				</form>
			 
			</div>
		</div>
	<?php 
		if (!empty($message)) {echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} 
	?>
	</body>
</html>