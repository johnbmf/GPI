<?php
  require_once("db_conn.php");
  session_start();

  $conexion = db_conn();
  $sol_id = $_GET['id'];
  $sql = "SELECT * FROM detalle_adquisicion WHERE sol_id=$sol_id";
  $item_list = $conexion->query($sql);

  while($row = $item_list->fetch_assoc()){
    $item_id = $row['item_id'];
    $cantidad = $row['cantidad'];
    $sql = "UPDATE inventario SET stock = stock + $cantidad  WHERE item_id = '$item_id'";
    $conexion->query($sql);

    if ($conexion->affected_rows == 1){
      continue;
    }

    else {
      header("Location: ../detalle_adquisicion.php?id=" . $sol_id . "&s=2");
      exit;
    }
  }

  $rec = $_SESSION['user'];
  $sql = "UPDATE solicitud_adquisicion SET estado ='ENTREGADO', receptor = '$rec' WHERE sol_id = $sol_id";
  $conexion->query($sql);

  if ($conexion->affected_rows == 1){
    header("Location: ../detalle_adquisicion.php?id=" . $sol_id . "&s=1");
  }

  else {
    header("Location: ../detalle_adquisicion.php?id=" . $sol_id . "&s=2");
    exit;
  }

?>
