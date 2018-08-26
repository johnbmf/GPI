<!DOCTYPE html>
<?php
  require_once('proc/db_conn.php');
  session_start();
  if ($_SESSION['user'] == '' || (time() - $_SESSION['LAST_ACTIVITY'] > 6000)){
    $_SESSION = array();

    if (ini_get("session.use_cookies")){
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }

    session_destroy();
    header("Location: index.php");
    exit;
  }

  $_SESSION['LAST_ACTIVITY'] = time();
  $_SESSION['actual'] = 'ver_item';

  $conexion = db_conn();
  $sql = "SELECT * FROM inventario";
  $resultado = $conexion->query($sql);

?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clearmin.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/roboto.css">
        <link rel="stylesheet" type="text/css" href="assets/css/material-design.css">
        <link rel="stylesheet" type="text/css" href="assets/css/small-n-flat.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <script src="assets/js/lib/jquery-2.1.3.min.js"></script>
        <script src="assets/js/jquery.mousewheel.min.js"></script>
        <script src="assets/js/jquery.cookie.min.js"></script>
        <script src="assets/js/fastclick.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/clearmin.min.js"></script>
        <script src="assets/js/demo/home.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
        <title>GPI - Items</title>
    </head>
    <body class="cm-no-transition cm-1-navbar">
        <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><a href="main.php" class="cm-logo"></a></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            <?php include_once('proc/menus.php'); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>Ver Items</h1>
                </div>
                <div class="dropdown pull-right">
                  <?php
                    include_once('proc/notificaciones.php');
                  ?>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center">
                            <a style="cursor:default;"><strong><?php echo $_SESSION["user"];?></strong></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-cog"></i> Ajustes</a>
                        </li>
                        <li>
                            <a href="proc/logout.php"><i class="fa fa-fw fa-sign-out"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div id="global">
            <div class="container-fluid cm-container-white" style="min-height:80vh;">
             <!--
             Crear tabla con items
             -->
             <?php
                if ($resultado->num_rows > 0){
                  echo '<table id="example" class="table table-striped table-hover" style="width:95%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>';
                  while ($row = $resultado->fetch_assoc()){
                    echo "
                    <tr>
                        <td>" . $row["item_id"] . "</td>
                        <td>" . $row["nombre"] . "</td>
                        <td>" . $row["categoria"] . "</td>
                        <td>" . $row["stock"] . "</td>
                    </tr>";
                  }

                  echo "
                </tbody>
                <tfoot>
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Categoria</th>
                      <th>Stock</th>
                  </tr>
                </tfoot>
              </table>
              <script>
              $(document).ready(function(){
                      $('#example').DataTable();
                  });
              </script>";
              }

             ?>


            <!--
            END
            -->
            
    </body>
</html>
