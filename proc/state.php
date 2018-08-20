<?php
  require_once("db_conn.php");
  session_start();

  $conexion = db_conn();

  $new_state = $_POST["estado"];
  $id_sol = $_GET["id"];
  if ($new_state == 'DESPACHADO'){
    header("Location: despachar.php?id=" . $id_sol);
    exit;
  }

  $sql = "UPDATE solicitud SET estado='$new_state' WHERE sol_id=$id_sol";
  $conexion->query($sql);

  if ($conexion->affected_rows == 1){
    header("Location: ../re_solicitud.php?id=" . $id_sol . "&s=1");
    exit;

  }

  else {
    header("Location: ../re_solicitud.php?id=" . $id_sol . "&s=2  ");
    exit;

  }

?>
