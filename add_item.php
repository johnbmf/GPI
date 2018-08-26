<!DOCTYPE html>
<?php
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
  $_SESSION['actual'] = 'add_item';
  require_once("proc/db_conn.php");

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
                    <h1>Añadir Items</h1>
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
             Crear un form que permita ingresar items para agregarlos al inventario.
             Puede que sea una buena opcion colocar aqui mismo poner algo para sumar stock.
             -->
                <p>Para ingresar un nuevo item al inventario llene el formulario a continuación.</p>
            <form method="POST" action="proc/add_itembd.php">
              <div class="row">
                <div class="col-xs-3">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i></i></div>
                      <input type="text" name="item_id" class="form-control" placeholder="Item ID" required>
                    </div>
                  </div>
                </div>

                <div class="col-xs-3">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i></i></div>
                      <input type="text" name="item_name" class="form-control" placeholder="Nombre Item" required>
                    </div>
                  </div>
                </div>

                <div class="col-xs-3">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i></i></div>
                      <select name="item_category" class="form-control" placeholder="Categoría" required>
                        <option value="" disabled selected value>-- Seleccione una categoría --</option>
                        <option value="MATERIAL">Material</option>
                        <option value="HERRAMIENTA">Herramienta</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-xs-3">
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon"><i></i></div>
                      <input type="number" name="item_stock" class="form-control" placeholder="Stock" min="1" required>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-xs-offset-11 col-xs-1">
                    <button type="submit" class="btn btn-block btn-gpi">Añadir</button>
                </div>
              </div>

            </form>

            <!--
            END FORM
            -->
            <footer class="cm-footer"><span class="pull-left">Conectado como: <?php echo $_SESSION["user"];?></span><span class="pull-right">&copy; PAOMEDIA SARL</span><span class="pull-right">&copy; JIP -</span></footer>
        </div>
        <script src="assets/js/lib/jquery-2.1.3.min.js"></script>
        <script src="assets/js/jquery.mousewheel.min.js"></script>
        <script src="assets/js/jquery.cookie.min.js"></script>
        <script src="assets/js/fastclick.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/clearmin.min.js"></script>
        <script src="assets/js/demo/home.js"></script>
    </body>
</html>
