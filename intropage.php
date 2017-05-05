<?php require_once("includes/connection.php"); ?> 
<?php
session_start();
if(!isset($_SESSION["session_username"])) { //esto comprueba que en la variable $_SESSION no haya ninguna sesion abierta (ningun usuario logado) si no encuentra nada nos redirige a la pagina de login.php
 header("location:login.php");
} else {
?>
<?php include ('cabecera.php');?> 
<?php include ('menulistas.php');?> 


	<footer></footer>	
</body>
</html>
 
<?php
}
?>
