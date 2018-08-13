<?php
  require_once("db_conn.php");
  session_start();

  $conexion = db_conn();

  $new_state = $_POST["estado"];
  $id_sol = $_GET["id"];

  $sql = "UPDATE solicitud SET estado='$new_state' WHERE sol_id=$id_sol";
  $conexion->query($sql);

  if ($conexion->affected_rows == 1){
    header("Location: ../re_solicitud.php?id=" . $id_sol . "&s=1");
    #echo $sql;
  }

  else {
    header("Location: ../re_solicitud.php?id=" . $id_sol . "&s=2  ");
    #echo $sql;
  }

?>
