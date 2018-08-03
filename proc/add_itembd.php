<?php
  require_once("db_conn.php");
  session_start();

  $conexion = db_conn();

  $item_id = $_POST["item_id"];
  $item_name = $_POST["item_name"];
  $item_category = $_POST["item_category"];
  $item_stock = $_POST["item_stock"];

  $sql = "INSERT INTO inventario VALUES ('$item_id', '$item_name', '$item_category', '$item_stock')";

  if ($conexion->query($sql) === TRUE){
    header("Location: ../add_item.php?s=1");
  }

  else {
    header("Location: ../add_item.php?s=2");
  }

?>
