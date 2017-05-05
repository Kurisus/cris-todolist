<?php require_once("includes/connection.php");
session_start();
$idlista=$_GET['idlista'];
if(!isset($_SESSION["session_idlista"])) { //esto comprueba que en la variable $_SESSION no haya ninguna sesion abierta (ningun usuario logado) si no encuentra nada nos redirige a la pagina de login.php
 header("location:intropage.php");
} else {
 ?>
<?php include ('cabecera.php');?> 
<?php include ('menulistas.php');?> 

<?php /*

$itemsQuery = $db->prepare("
	SELECT id, name, done
	FROM items
	WHERE id_lista = ".$_SESSION["session_idlista"].");

$itemsQuery->execute([
	'id_lista'=> $_SESSION["session_idlista"]
]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];*/

/*foreach($items as $item){
	echo $items['name'], '<br>';
	print_r($item);
}*/
?>


 <?php 
if(isset($_POST["itemnuevo"])){
 
	if(!empty($_POST['nombre_item'])){
		$nombre_item=$_POST['nombre_item'];
		$completado='S';
		
	
		if ($completado=='S'){
			$completado=1;
		} else{
			$completado=0;
		}
		
		$idlista=$_GET['idlista'];//$_SESSION['session_idlista'];
		//$fecha_creacion=date('Y-m-s h:i:s');
	 
		$query=mysql_query("SELECT * FROM items WHERE id_lista=".$idlista."'");
		$numrows=mysql_num_rows($query); //guardamos las filas que devuelve la consulta
	 
		if($numrows==0){
		
			$sql="INSERT INTO items (id_lista, nombre_item, fecha_creacion, completado) VALUES ('$idlista','$nombre_item',CURDATE(),'$completado')";
			$result=mysql_query($sql);
			
			if($result){
				$message = "Tarea  Creada Correctamente";
				//header("location:edititems2.php");
				//echo $sql;
			} else {
				$message = "Error al modificar los datos";
			}
		} else {
			$message = "La lista ya existe. Por favor, intenta con otro!"; //este mensaje lo mostramos si el nombre de usuario ya existe (es clave única en la base de datos)
		}
	} else {
		$message = "No se puede actualizar porque hay datos en blanco";
		
	}
}

?>
 
<?php if (!empty($message)) {echo '<div class="alert alert-danger">' . "Mensaje: ". $message . "</div>";} ?>

<?php	/*

	if (!empty($_GET["idlista"])){ 
		$_SESSION['session_idlista']= $_GET["idlista"];
	}
	
	$datosNota="SELECT * FROM items WHERE id_lista=".$_SESSION['session_idlista'];
	$result = mysql_query($datosNota);
//	$row = mysql_fetch_assoc($result); 
			
	if (mysql_num_rows($result) <> 0){
		while($row=mysql_fetch_assoc($result, MYSQL_ASSOC)){	
			echo '<div class="col-sm-6">';
			echo '<div class="col-sm-4">';
			if ($row['completado']){
				echo '<label name="e'.$row['id_item'].'" id="e'.$row['id_item'].'" value="e'.$row['id_item'].'">'.$row['nombre_item'].'</label>';
				echo '<input type="hidden" name="'.$row['id_item'].'" id="'.$row['id_item'].'" value="'.$row['id_item'].'">';
			} else {
				echo '<label style="text-decoration: line-through" name="e'.$row['id_item'].'" id="e'.$row['id_item'].'" value="e'.$row['id_item'].'">'.$row['nombre_item'].'</label>';
				echo '<input type="hidden" name="'.$row['id_item'].'" id="'.$row['id_item'].'" value="'.$row['id_item'].'">';						
			}
			echo '</div>';
			echo '<div class="col-sm-2">';		
			if ($row['completado']){
				echo '<input id="b'.$row['id_item'].'" type="button" class="btn btn-warning" href="javascript:;" onclick="FinalizaNota($'."('#".$row['id_item']."').val(),'#e".$row['id_item']."');return false;".'" value="Finalizar"/></input>';
			} else {
				echo '<input id="b'.$row['id_item'].'" type="button" class="btn btn-success" href="javascript:;" onclick="FinalizaNota($'."('#".$row['id_item']."').val(),'#e".$row['id_item']."');return false;".'" value="Activar"/></input>';
			}																									
			echo '</div>';
			echo '</div>';
		 }
	} 
		 // else{
	
 	echo '<form class="form-horizontal col-sm-6" name="registerform" id="registerform" action="edititems2.php" method="post">';
	echo '<div class="list-group">';
	if (mysql_num_rows($result) == 0)
		echo '<h3>No tienes notas todavía</h3>';
		echo '<div class="form-group">';
		echo '<label class="control-label col-sm-2">Texto</label>';
		echo '<div class="col-sm-4"> ';
		echo '<input type="text" name="texto" id="texto" class="form-control" value="">';
		echo '</div>';
		echo '</div>'; 
		echo '</div>';			

*/
	?> 
<form class="form-horizontal col-sm-6" name="registerform" id="registerform" action="edititems2.php" method="post">
	<div class="list-group">
	<h3>No tienes notas todavía</h3>
		<div class="form-group">
		<label class="control-label col-sm-2">Texto</label>
		<div class="col-sm-4"> 
		<input type="text" name="texto" id="texto" class="form-control" value="">
		</div>
		</div>
		</div>	

	  <div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-1">	
					<input type="submit" name="itemnuevo" id="guardarnota" class="btn btn-default" value="Añadir nota" />
				</div>
		 </div>
	
	
</form>

<?php
}
?>




<!--<div class="listas">
	<h1>Nueva Tarea</h1>
	<?php //if (!empty($_GET["idlista"])): ?>
		<ul class="items">
			<?php //foreach ($items as $item): ?>
			<li>
				<span class="item <?php //echo $item['completado'] ? 'completado':'' ?>"><?php //echo $item['nombre_item']; ?></span>
				<?php //if (!$item['completado']):?>
				<a href="mark.php?as=completado&item=<?php //echo $item['id_item']; ?> class="done-button">Hecho</a>
				<?php //endif; ?>
			</li>
			<?php //endforeach; ?>
		</ul>
		<?php //else: ?>
			<p>No tienes ningun item todavía</p>
		<?php //endif; ?>								
			
	<form class="item-add" action="additems.php?idlista=<?php//$_GET['idlista']?>" method="post">	
		<input type="text" name="name" placeholder="Nuevo Item" class="input" autocomplete="off" required>
		<input type="submit" value="Añadir" class="submit">
	</form>
</div>-->