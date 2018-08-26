<?php
  if ($_SESSION['tipo'] == 3){  //Notificaciones para bodega

    $conn = db_conn();

    $fecha_notificacion = new DateTime();
    $fecha_notificacion->modify("+7 day");    //dias en que una peticion se notifica antes de su fecha limite.
    $fecha_notificacion =  $fecha_notificacion->format("Y-m-d");
    $hoy = new DateTime();
    $hoy = $hoy->format("Y-m-d");

    $sql = "SELECT * FROM solicitud WHERE fecha_limite <= '$fecha_notificacion' AND fecha_limite >= '$hoy' AND estado != 'COMPLETADA'";
    $pendientes = $conn->query($sql);

    $sql = "SELECT * FROM solicitud WHERE fecha_limite < '$hoy' AND estado != 'COMPLETADA'";
    $expiradas = $conn->query($sql);

    if ($pendientes->num_rows > 0){    //Caso de que existen no completados de aqui a 7 dias
      echo "
      <button class='btn btn-primary md-notifications-white' data-toggle='dropdown'> <span class='label label-danger'>!</span> </button>
      <div class='popover cm-popover bottom'>
          <div class='arrow'></div>
          <div class='popover-content'>
              <div class='list-group'>
                  <a href='r_solicitud.php' class='list-group-item'>
                      <h4 class='list-group-item-heading text-overflow'>
                          <i class='fa fa-fw fa-warning'></i> Existen solicitudes no completadas.
                      </h4>
                      <p class='list-group-item-text text-overflow'>Hay un total de  $pendientes->num_rows  solicitudes sin completar con fecha límite dentro de 7 días.</p>
                  </a>
                  ";

                  if ($expiradas->num_rows > 0) {
                    echo "
                    <a href='r_solicitud.php' class='list-group-item'>
                        <h4 class='list-group-item-heading'>
                            <i class='fa fa-fw fa-warning'></i> Existen solicitudes expiradas.
                        </h4>
                        <p class='list-group-item-text'>Hay un total de  $expiradas->num_rows  solicitudes con tiempo límite expirado.</p>
                    </a>
                    ";
                  }
              echo "
              </div>
          </div>
      </div>
      ";
    }

    else if ($expiradas->num_rows > 0){
      echo "
      <button class='btn btn-primary md-notifications-white' data-toggle='dropdown'> <span class='label label-danger'>!</span> </button>
      <div class='popover cm-popover bottom'>
          <div class='arrow'></div>
          <div class='popover-content'>
              <div class='list-group'>
                  <a href='r_solicitud.php' class='list-group-item'>
                      <h4 class='list-group-item-heading text-overflow'>
                          <i class='fa fa-fw fa-warning'></i> Existen solicitudes expiradas.
                      </h4>
                      <p class='list-group-item-text text-overflow'>Hay un total de  $expiradas->num_rows  solicitudes con tiempo límite expirado.</p>
                  </a>
              </div>
          </div>
      </div>
      ";
    }

    else{
      echo "
      <button class='btn btn-primary md-notifications-white' data-toggle='dropdown'> <span class='label label-danger'></span> </button>
      <div class='popover cm-popover bottom'>
          <div class='arrow'></div>
          <div class='popover-content'>
            <div class='list-group'>
                <a href='#' class='list-group-item'>
                    <h4 class='list-group-item-heading text-overflow'>
                        <i class='fa fa-fw fa-envelope'></i> No tienes notificaciones.
                    </h4>
                    <p class='list-group-item-text text-overflow'></p>
                </a>
            </div>
          </div>
      </div>
      ";
    }
  }

  else{   //Para usuarios que no son de bodega aun no hay notificaciones implementadas
    echo "
    <button class='btn btn-primary md-notifications-white' data-toggle='dropdown'> <span class='label label-danger'></span> </button>
    <div class='popover cm-popover bottom'>
        <div class='arrow'></div>
        <div class='popover-content'>
          <div class='list-group'>
              <a href='#' class='list-group-item'>
                  <h4 class='list-group-item-heading text-overflow'>
                      <i class='fa fa-fw fa-envelope'></i> No tienes notificaciones.
                  </h4>
                  <p class='list-group-item-text text-overflow'></p>
              </a>
          </div>
        </div>
    </div>
    ";
  }
?>
