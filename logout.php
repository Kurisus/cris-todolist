<?php 
session_start(); //inicia la sesion
unset($_SESSION['session_username']); //unset le quita el valor a la variable session_username del array $_SESSION
session_destroy(); //destruye todo el entorno 
header("location:login.php"); //redirige a la pag login.php
?>
