<?php
session_start();
require_once("includes/connection.php");

if (isset( $_GET['id_lista'])){
	
	$idlista = $_GET['id_lista'];
	

	
}
header("Location: edititems2.php?idlista=$_SESSION[session_idlista]");
?>