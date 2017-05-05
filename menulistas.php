
<?php
	$usuario=$_SESSION["session_username"];
		$id=$_SESSION["session_id"];
		//$_SESSION["session_idlista"]=$id_list;
		require_once("includes/connection.php");
		//require_once "clases.php";
		//require_once "includes/funciones.php";
		
function misListas($usuario){
	 	 $sql="SELECT * from listas
		WHERE id_usuario = ".$usuario;
		
		$result = mysql_query($sql);
		if (mysql_num_rows($result) <> 0)
		{
			$cl='';
			echo '
				 <div class="container-fluid">
					
					<div class="row">
						<div class="col-sm-5">
						<div class="listas">
							<h2>Listas</h2>
							<nav class="hidden-xs-down bg-faded sidebar">
								<ul class="nav nav-pills nav-stacked">
									
									';
			$ya=0;
			while($row=mysql_fetch_assoc($result, MYSQL_ASSOC)){
				if (!$ya){
					$ya=1;
					echo $cl;
				}

				if ($row['completada']){
					$cl=' text-success bg-success ';
//					echo $cl;
					
				} else 
					$_SESSION["session_idlista"]=$row['id_lista'];
					$_SESSION["session_nombrelista"]=$row['nombre_lista'];
					$cl=' text-danger bg-danger ';
					echo '<li class="nav-item"><a class="nav-link" href="edititems2.php?idlista='.$row['id_lista'].'" >'.$row['nombre_lista'];
					echo '<p class="list-group-item-text '.$cl.'">'.$row['fecha_caducidad'].'</p></a></li>';
					echo '<a href="deletelist.php?idlista='.$row['id_lista'].'" class="done-button">Borrar</a>';
					$cl='';
		 	}
			echo '</ul></nav></div></div>
			<div class="col-sm-5">
				<main class="offset-md-2 pt-3">
					<div class="listas" >
			';

		 } else{
		 	echo '
				<div class="container-fluid">
					<h2>Sin Listas</h2>
				</div>';
		 	}
	}
		
		misListas($id);

?>
