<?php require_once("includes/connection.php"); ?> 
<?php
session_start();
if(!isset($_SESSION["session_username"])) { //esto comprueba que en la variable $_SESSION no haya ninguna sesion abierta (ningun usuario logado) si no encuentra nada nos redirige a la pagina de login.php
 header("location:intropage.php");
} else {
?>
<?php include ('cabecera.php');?> 
<?php include ('menulistas.php');?> 

<?php
 
if(isset($_POST["listanueva"])){ //esto sólo se ejecuta si hemos pulsado el boton del formulario de registro
 
	if(!empty($_POST['nombrelista'])&& !empty($_POST['fecha_cad'])) {
		$idlista=$_SESSION["session_idlista"];
		$idusuario=$_SESSION["session_id"];
		$nombrelista=$_POST['nombrelista'];
		$fecha_cad=$_POST['fecha_cad'];
	 
	 $query=mysql_query("SELECT * FROM listas WHERE nombre_lista='".$nombrelista."'");
	 $numrows=mysql_num_rows($query); //guardamos las filas que devuelve la consulta
	 
		if($numrows==0){// si el resultado de la consulta es 0, guardamos el usuario en la base de datos
			
			$sql="INSERT INTO listas (id_usuario, nombre_lista, fecha_creacion, fecha_caducidad) VALUES($idusuario,'$nombrelista',CURDATE(),'$fecha_cad')"; 
			$result=mysql_query($sql); //guardamos los datos en la variable result
	 
			if($result){ //comprobamos si en la variable result hay datos
				//$message = "Lista Creada Correctamente";//y mostramos el mensaje de que se ha creado la cuenta
				header('location: intropage.php');
			} else {
				$message = "Error al ingresar datos de la informacion!"; //si hay algun error mostramos este mensaje
			}
	 
		} else {
			$message = "La lista ya existe. Por favor, intenta con otro!"; //este mensaje lo mostramos si el nombre de usuario ya existe (es clave única en la base de datos)
		}
	 
	} else {
	 $message = "Todos los campos deben estar rellenos"; //si no se han rellenado todos los campos del formulario mostramos este mensaje
	}
	
}
?>
 
<?php if (!empty($message)) {
	echo "<p class=\"error\">" . "Mensaje: ". $message . "</p>";} 

?>	


		 		<h1>Nueva Lista</h1>
					<section class="row text-center placeholders">
						<!--<div class="col-6 col-sm-3 placeholder">-->
							<form name="listform" id="listform" action="" method="POST">
								<p style="text-align: center;">
									<label>Nombre De Lista<br />
									<input type="text" name="nombrelista" id="nombrelista" class="input" value="" size="20" /></label>
								</p>
								<p style="text-align: center;">
									<label>Fecha de caducidad<br />
									<input type="date" name="fecha_cad" id="fecha_cad" class="input" value="" size="20" /></label>
								</p>
								<p class="submit">
									<input type="submit" name="listanueva" class="button" value="Nueva" />
								</p>
							</form>
						<!--</div>-->
					</section>
			</div>
		</div>
		</main>
		
	</div>
		
<?php } ?>