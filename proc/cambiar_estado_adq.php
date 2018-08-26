<?php
  require_once("db_conn.php");
  session_start();

  $conexion = db_conn();

  $new_state = $_POST["estado"];
  $id_sol = $_GET["id"];
  $rec = $_SESSION['user'];
  if ($new_state == 'ENTREGADO'){
    header("Location: add_entrega.php?id=" . $id_sol);
    exit;
  }

  $sql = "UPDATE solicitud_adquisicion SET estado='$new_state', receptor = '$rec' WHERE sol_id=$id_sol";
  $conexion->query($sql);

  if ($conexion->affected_rows == 1){
    header("Location: ../detalle_adquisicion.php?id=" . $id_sol . "&s=1");
    exit;

  }

  else {
    header("Location: ../detalle_adquisicion.php?id=" . $id_sol . "&s=2");
    exit;

  }

?>
