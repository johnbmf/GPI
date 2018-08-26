<?php
  require_once('db_conn.php');
  session_start();

  $conexion = db_conn();

  $sol_id = $_POST['sol_id'];
  $comentario = $_POST['comentario'];
  $fecha = DATE("y-m-d");
  $emisor = $_SESSION['user'];

  $sql1 = "INSERT INTO solicitud_adquisicion VALUES ('$sol_id','$fecha','PENDIENTE','$comentario','$emisor', '')";

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
          $sql2 = "INSERT INTO detalle_adquisicion VALUES ('$sol_id','$NombreItem','$Cantidad','$ItemID')";

          if($conexion->query($sql2) === TRUE ){
            continue;
          }
          else{
            header("Location: ../sol_adq.php?s=2");
          }

        }
      }
      header("Location: ../sol_adq.php?s=1");
      exit;
  }
  else{
    header("Location: ../sol_adq.php?s=400");
    exit;
      #header("Location: ../gen_solicitud.php?s=3");
    #echo("Ha ocurrido un problema con la generación de la solicitud")
  }

?>
