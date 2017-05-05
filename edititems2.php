<?php require_once("includes/connection.php");
session_start();
if(!isset($_SESSION["session_idlista"])) { //esto comprueba que en la variable $_SESSION no haya ninguna sesion abierta (ningun usuario logado) si no encuentra nada nos redirige a la pagina de login.php
 header("location:intropage.php");
} else {
 ?>
 
<?php include ('cabecera.php');?> 
<?php include ('menulistas.php');?> 

<?php

if (!empty($_GET["idlista"])){
		$_SESSION['session_idlista']= $_GET["idlista"];
		//$lista=$_SESSION['session_idlista'];

}
		$itemsQuery = $db->prepare("
			SELECT id_item, nombre_item, completado
			FROM items
			WHERE id_lista = ".$_SESSION['session_idlista']);

		//echo $_SESSION["session_idlista"];

		$itemsQuery->execute([
			'id_lista'=> $_SESSION["session_idlista"]
		]);

		$items = $itemsQuery->rowCount() ? $itemsQuery : [];

/*foreach($items as $item){
	echo $items['nombre_item'], '<br>';
	print_r($item);
	
	
	
	<?php echo $_SESSION["session_nombrelista"] ?>
}*/

?>


	<h1>Nueva Tarea</h1>
	<?php if (!empty($_SESSION["session_idlista"])): ?>
		<ul class="items">
			<?php foreach ($items as $item): ?>
			<li>
				<span class="item <?php echo $item['completado'] ? 'completado':'' ?>"><?php echo $item['nombre_item']; ?></span>
				<?php if (!$item['completado']):?>
				<a href="mark.php?as=completado&item=<?php echo $item['id_item'];?>" class="done-button">Hecho</a>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php else: ?>
			<p>No tienes ningun item todavía</p>
		<?php endif; ?>								
			
	<form class="item-add" action="additems.php?idlista=<?php echo $_SESSION['session_idlista'] ?>" method="post">
		<input type="text" name="nombreItem" placeholder="Nuevo Item" class="input" autocomplete="off" required>
		<input type="submit" value="Añadir" class="submit">
	</form>
</div>

<?php } ?>