<?php
  require_once('db_conn.php');
  session_start();

  $config = parse_ini_file('config.ini');

	$conexion = db_conn();

	$nombreusuario = $conexion->real_escape_string($_POST['user']);
	$pass = base64_encode($_POST['pass']);

	$sql = "SELECT * FROM usuario WHERE user='$nombreusuario'";
	$resultado = $conexion->query($sql);

	if($resultado->num_rows == 1){
		$fila = $resultado->fetch_assoc();
		if ($pass == $fila['pass']){
			$_SESSION['user'] = $fila['user'];
			$_SESSION['tipo'] = $fila['tipo'];
      $_SESSION['CREATED'] = time();
      $_SESSION['LAST_ACTIVITY'] = time();
			header("Location: ../main.php");
		}
		else{
      header("Location: ../index.php?fail=2");
		}
	}

	else{
		header("Location: ../index.php?fail=1");
	}
?>
