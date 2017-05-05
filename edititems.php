<?php require_once("includes/connection.php");
session_start();


 ?>
<?php include ('cabecera.php');?> 
<?php include ('menulistas.php');?> 

<?php

$_SESSION['session_idlista']= $_GET["idlista"];
if (!empty($_GET["idlista"])){
 
	if(isset($_POST["additem"])){ //esto sólo se ejecuta si hemos pulsado el boton del formulario de registro
 
		if(!empty($_POST['nombre_item'])) {
		 $item=$_POST['nombre_item'];
		 //$password=$_POST['password'];
		 //$email=$_POST['email'];
		 
		 $query=mysql_query("SELECT * FROM items WHERE nombre_item='".$item."'");
		 $numrows=mysql_num_rows($query); //guardamos las filas que devuelve la consulta
	 
			if($numrows==0){// si el resultado de la consulta es 0, guardamos el usuario en la base de datos
				 $sql="INSERT INTO items
				 (id_lista,nombre_item, fecha_creacion,completado)
				 VALUES(".$_SESSION['session_idlista'].",'$item',NOW(),'0')";
				 
				 echo $sql;
				 
				$result=mysql_query($sql); //guardamos los datos en la variable result
	 
				if($result){ //comprobamos si en la variable result hay datos
					$message = "Item añadido correctamente "; //y mostramos el mensaje de que se ha creado la cuenta
				} else {
					$message = "Error al ingresar datos de la informacion!"; //si hay algun error mostramos este mensaje
				}
	 
			} else {
				$message = "El item ya existe! Por favor, intenta con otro!"; //este mensaje lo mostramos si el nombre de usuario ya existe (es clave única en la base de datos)
			}
	 
		} else {
			$message = "Los campos no deben estar vacios!"; //si no se han rellenado todos los campos del formulario mostramos este mensaje
		}
	}

?>


<div class="listas">
	<h1>Nueva Tarea</h1>
	<form name="listform" id="listform" action="" method="POST">
		<p style="text-align: center;">
			<label>Nombre tarea<br />
			<input type="text" name="nombrelista" id="nombrelista" class="input" value="" size="20" /></label>
		</p>
			 		
 		<p class="submit">
			<input type="submit" name="additem" class="button" value="Añadir" />
 		</p>
	</form>
</div>

<?php 
}else{
	echo "No tienes items";
}
?>
