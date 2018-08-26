<?php
  require_once('db_conn.php');
  session_start();

  $conexion = db_conn();
  $sol_id = $_GET['id'];
  $despacho_id = $sol_id;

  $sql = "UPDATE solicitud SET estado='PENDIENTE' WHERE sol_id=$sol_id";
  $conexion->query($sql);

  $sql = "UPDATE despacho SET estado='DEVUELTO' WHERE sol_id=$sol_id";
  $conexion->query($sql);

  $sql = "SELECT * FROM detallesolicitud WHERE sol_id = $sol_id";
  $lista_items = $conexion->query($sql);

  while ($row = $lista_items->fetch_assoc()){   //devuelta al stock
    $item_id = $row['item_id'];
    $cantidad = $row['cantidad'];
    $sql = "UPDATE inventario SET stock = stock + $cantidad WHERE item_id = '$item_id'";
    $conexion->query($sql);
  }

  header("Location: ../solicitud.php?id=" . $sol_id);
  exit;
?>
