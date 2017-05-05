<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>To do List ~ Kuri</title>
	
	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
	<link href="css/estilos.css" rel="stylesheet">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	
</head> 

<body>
<div id="welcome">
		<div id="titulo">To Do List</div>
		<h2>Hola, <span><?php echo $_SESSION['session_username'];?>! </span></h2>  
		<nav class="navbar navbar-inverse">
		 	<div class="container-fluid">
		    	<div class="navbar-header">
		      		<a class="navbar-brand" href="intropage.php"><span class="glyphicon glyphicon-star"></span></a>
		   	 	</div>
		    	<ul class="nav navbar-nav">
		      		<li><a href="nuevalista.php"><span class="glyphicon glyphicon-list"></span> Nueva Lista</a></li>
		    	</ul>
		   		<ul class="nav navbar-nav navbar-right">
		      		<li><a href="edituser.php"><span class="glyphicon glyphicon-user"></span> Editar Datos</a></li>
		      		<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		    	</ul>
		  	</div>
		</nav>
</div>
</body>