<?php
  require_once("db_conn.php");
  session_start();

  $conexion = db_conn();

  $new_state = $_POST["estado"];
  $id_sol = $_GET["id"];
  if ($new_state == 'EN REVISION'){
    header("Location: devolver.php?id=" . $id_sol);
    //header("Location: ../solicitud.php?id=" . $id_sol . "&s=100");
    exit;
  }

  $sql = "UPDATE solicitud SET estado='$new_state' WHERE sol_id=$id_sol";
  $conexion->query($sql);

  $f_r = DATE('y-m-d');
  $rec = $_SESSION['user'];
  $sql = "UPDATE despacho SET estado='$new_state', receptor= '$rec', fecha_recepcion = '$f_r' WHERE sol_id=$id_sol";
  $conexion->query($sql);

  if ($conexion->affected_rows == 1){
    header("Location: ../solicitud.php?id=" . $id_sol . "&s=1");
    exit;

  }

  else {
    header("Location: ../solicitud.php?id=" . $id_sol . "&s=2");
    exit;

  }

?>
