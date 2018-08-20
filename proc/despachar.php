<?php
  require_once('db_conn.php');
  session_start();

  $conexion = db_conn();
  $sol_id = $_GET['id'];
  $despacho_id = $sol_id;
  $fecha_creacion = DATE('y-m-d');
  $estado = 'ESPERANDO CONFIRMACION';
  $comentario = '';
  $emisor = $_SESSION['user'];
  $receptor = '';

  $sql = "INSERT INTO despacho VALUES ('$despacho_id', '$fecha_creacion', NULL, '$estado', '$comentario', '$emisor', '$receptor', '$sol_id')";

  if($conexion->query($sql) === TRUE ){
    $sql = "UPDATE solicitud SET estado='DESPACHADO' WHERE sol_id=$sol_id";
    $conexion->query($sql);

    if ($conexion->affected_rows == 1){
      header("Location: ../re_solicitud.php?id=" . $sol_id . "&s=1");
      exit;
      #echo $sql;
    }

    else {
      header("Location: ../re_solicitud.php?id=" . $sol_id . "&s=2  ");
      exit;
      #echo $sql;
    }
  }

  else{
    //echo $conexion->error;
    header("Location: ../re_solicitud.php?id=" . $sol_id . "&s=2");
    exit;
  }

?>
