<?php
session_start();
require_once("includes/connection.php");

if (isset($_GET['as'], $_GET['item'])){
	$as = $_GET['as'];
	$item = $_GET['item'];
	
	switch($as){
		case 'completado':
			$doneQuery= $db->prepare(" UPDATE items SET completado = 1	WHERE id_item = ".$item." AND id_lista = ".$_SESSION['session_idlista']);

			
			$doneQuery->execute([
				'id_item'=>$item,
				'id_lista'=>$_SESSION['session_idlista']
			]);
			
		break;
		/*case 'notdone':
			$doneQuery= $db->prepare ("
				UPDATE items
				SET done = 0
				WHERE id = :item
				AND user = :user				
			");
			$doneQuery->execute([
				'item'=>$item,
				'user'=> $_SESSION['user_id']
			]);
		break;*/
		
	}
	
}
header("Location: edititems2.php?idlista=$_SESSION[session_idlista]");
?>