<?php
  require_once('db_conn.php');
  session_start();

  $conexion = db_conn();

  $FechaLimite = $_POST["fecha_lim"];
  $Sol_ID = $_POST["sol_id"];
  $Comentario = $_POST["comentario"];
  $FechaCreacion = DATE("y-m-d");

  $sql1 = "INSERT INTO solicitud VALUES ('$Sol_ID','$FechaCreacion','$FechaLimite','PENDIENTE','$Comentario')";

  #$sql2 = "INSERT INTO detallesolicitud VALUES ('$Sol_ID','$NombreItem','$Cantidad','$ItemID')";

  if($conexion->query($sql1) === TRUE ){
      for ($i = 1; $i <= 5 ; $i++){
        $ind1 = "item_detalle_" . $i;
        $ind2 = "item_stock_" . $i;

        if (isset($_POST[$ind1])){
          $ex = explode(" ", $_POST[$ind1], 2);
          $ItemID = $ex[0];
          $NombreItem = $ex[1];
          $Cantidad = $_POST[$ind2];
          $sql2 = "INSERT INTO detallesolicitud VALUES ('$Sol_ID','$NombreItem','$Cantidad','$ItemID')";

          if($conexion->query($sql2) === TRUE ){
            continue;
          }
          else{
            header("Location: ../gen_solicitud.php?s=2");
          }

        }
      }
      header("Location: ../gen_solicitud.php?s=1");
  }
  else{
    header("Location: ../gen_solicitud.php?s=2");
      #header("Location: ../gen_solicitud.php?s=3");
    #echo("Ha ocurrido un problema con la generación de la solicitud")
  }

?>
