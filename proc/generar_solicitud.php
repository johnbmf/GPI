<?php
  require_once('db_conn.php');
  session_start();

  $conexion = db_conn();

  $FechaLimite = $_POST["fecha_lim"]; #####
  $Sol_ID = $_POST["sol_id"]; #####
  $ItemID = $_POST["item_id"];
  $NombreItem = $_POST["item_name"];
  $Categoria = $_POST["item_category"];
  $Cantidad = $_POST["item_stock"];
  $Comentario = $_POST["comentario"]; ######
  $FechaCreacion = DATE("y-m-d");

  $sql1 = "INSERT INTO solicitud VALUES ('$Sol_ID','$FechaCreacion','$FechaLimite','PENDIENTE','$Comentario')";

  $sql2 = "INSERT INTO detallesolicitud VALUES ('$Sol_ID','$NombreItem','$Cantidad','$ItemID')";

  if($conexion->query($sql1) === TRUE ){#&& $conexion->query($sql2) === TRUE){

      if($conexion->query($sql2) === TRUE ){
        header("Location: ../gen_solicitud.php?s=1");
      }
      else{
        echo $conexion->error;
      }

  }
  else{
    echo $conexion->error;
      #header("Location: ../gen_solicitud.php?s=3");
    #echo("Ha ocurrido un problema con la generación de la solicitud")
  }

?>
