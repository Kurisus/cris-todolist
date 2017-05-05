<?php
session_start();

require_once("includes/connection.php");

$lista=$_SESSION['session_idlista'];


if(isset($_POST['nombreItem'])){
	$nombre_item = trim($_POST['nombreItem']);
	
	if(!empty($nombre_item)){
		$addedQuery = $db->prepare("
			INSERT INTO items (id_lista, nombre_item, fecha_creacion, completado)
			VALUES('$lista','$nombre_item',NOW(),0)
		");
		
		$addedQuery->execute([
			'nombre_item'=>$nombre_item,
			'id_lista'=>$_SESSION['session_idlista']
		]);
	}
}

header("Location: edititems2.php?idlista=$lista");

?>