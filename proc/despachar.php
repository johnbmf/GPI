<?php
  require_once('db_conn.php');
  session_start();

  $conexion = db_conn();
  $sol_id = $_GET['id'];
  $despacho_id = $sol_id;
  $fecha_creacion = DATE('y-m-d');
  $estado = 'ESPERANDO CONFIRMACION';
  $comentario = 'STUB COMM';
  $emisor = $_SESSION['user'];
  $receptor = '';

  $sql = "SELECT * FROM solicitud WHERE sol_id = $sol_id";
  $obra = $conexion->query($sql)->fetch_assoc()['obra'];


  $sql = "INSERT INTO despacho VALUES ('$despacho_id', '$fecha_creacion', NULL, '$estado', '$comentario', '$emisor', '$receptor', '$sol_id', '$obra')
          ON DUPLICATE KEY UPDATE estado = '$estado', emisor = '$emisor'";
  $conexion->query($sql);

  if($conexion->affected_rows == 1 || $conexion->affected_rows == 2){
    $sql = "SELECT * FROM detallesolicitud WHERE sol_id = $sol_id";
    $lista_items = $conexion->query($sql);

    while ($row = $lista_items->fetch_assoc()){
      $cantidad = $row['cantidad'];
      $item_id = $row['item_id'];
      $sql = "UPDATE inventario SET stock = stock - $cantidad WHERE item_id = '$item_id'";
      $conexion->query($sql);
    }
    $sql = "UPDATE solicitud SET estado='DESPACHADO' WHERE sol_id=$sol_id";
    $conexion->query($sql);

    if ($conexion->affected_rows == 1){
      header("Location: ../re_solicitud.php?id=" . $sol_id . "&s=1");
      exit;
      #echo $sql;
    }

    else {
      header("Location: ../re_solicitud.php?id=" . $sol_id . "&s=2");
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
