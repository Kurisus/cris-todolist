
<?php
require("constants.php"); //hacemos referencia al archivo donde estan las constantes

$con = new PDO (DB_SERVER,DB_USER, DB_PASS) or die(mysqli_error()); //para utilizar las constantes no se pone el $
	mysqli_select_db(DB_NAME) or die("Cannot select DB");

$db= new PDO('mysql:dbname=todolist;host=localhost', 'root','cristoREY2016');
	
	?>
