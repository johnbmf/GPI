<!DOCTYPE html>
<?php
  require_once("proc/db_conn.php");
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
  $_SESSION['actual'] = 'det_adq';


  $conexion = db_conn();
  $sol_id = $_GET["id"];
  $sql = "SELECT * FROM solicitud_adquisicion WHERE sol_id=$sol_id";
  $resultado = $conexion->query($sql)->fetch_assoc();
  $sql = "SELECT * FROM detalle_adquisicion WHERE sol_id=$sol_id";
  $res2 = $conexion->query($sql);

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
        <title>GPI - Solicitudes</title>
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
                    <h1>Detalle de solicitud de adquisición</h1>
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
                <h2 class="text-center" style="margin-top:0;">Solicitud <?php echo $sol_id;?></h2>
                <h3> Detalle </h3>
                <hr>
                <div class="row">
                  <div class="col-xs-6 col-md-2">
                    <strong>Fecha de creación</strong><br>
                    <strong>Estado</strong><br>
                    <strong>Emisor</strong><br>
                    <strong>Última Modificación</strong><br>
                  </div>
                  <div class="col-xs-6 col-md-10">
                    <?php
                    echo ": " . $resultado["fecha_creacion"] . "<br>";
                    echo ": " . $resultado["estado"] . "<br>";
                    echo ": " . $resultado["emisor"] . "<br>";
                    echo ": " . $resultado["receptor"] . "<br>";
                    ?>
                  </div>
                </div>
                <br>
                <h3> Materiales Solicitados </h3>
                <hr>
                <div class="row">
                  <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col" class="col-xs-2">ID</th>
                          <th scope="col" class="col-xs-8 text-center">Nombre</th>
                          <th scope="col" class="col-xs-2 text-center">Cantidad</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        while ($row = $res2->fetch_assoc()){
                          echo "
                          <tr>
                              <td>" . $row["item_id"] . "</td>
                              <td>" . $row["nombre"] . "</td>
                              <td class='text-center'>" . $row["cantidad"] . "</td>
                          </tr>";
                        }
                       ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                <h3> Comentarios adicionales </h3>
                <hr>
                <div class="row">
                  <div class="col-xs-10 col-xs-offset-1">
                  <?php
                    echo $resultado["comentario"];
                  ?>
                  </div>
                </div>

              <?php
              if ($_SESSION['tipo'] == 4 || $_SESSION['tipo'] == 1){
              echo '
              <br>
              <h3> Responder Solicitud </h3>
              <hr>
              <div class="row">
                <div class="col-md-1 col-xs-6">
                  <strong>Cambiar estado a: </strong>
                </div>
                <div class="col-md-2 col-xs-6">
                  <form method="POST" action="proc/cambiar_estado_adq.php?id=' . $_GET['id'] . '">
                    <select name="estado" class="form-control" placeholder="Categoría" required>
                      <option value="" disabled selected value>-- Seleccione un estado --</option>
                      <option value="EN REVISION">En revisión</option>
                      <option value="APROBADO">Aprobado</option>
                      <option value="ENTREGADO">Entregado</option>
                    </select>
                </div>
                <div class="col-md-2 col-xs-12">
                    <button type="submit" class="btn btn-block btn-success">Responder</button>
                  </form>
                </div>
                </div>';
              }
              ?>

            </div>
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
