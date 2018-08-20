<?php
  if ($_SESSION['tipo'] == 1){    //admin
    if ($_SESSION['actual'] == 'add_item'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class="active"><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'gen_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class="active"><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'main'){
      echo '<li class="active"><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'r_sol' || $_SESSION['actual'] == 're_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class="active"><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if($_SESSION['actual'] == 'sol' || $_SESSION['actual'] == 'ver_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class="active"><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'ver_item'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class="active"><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }
  }

  else if ($_SESSION['tipo'] == 2){    //OBRA

    if ($_SESSION['actual'] == 'gen_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class="active"><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'main'){
      echo '<li class="active"><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>';
    }

    else if($_SESSION['actual'] == 'sol' || $_SESSION['actual'] == 'ver_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class="active"><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>';
    }
  }

  else if ($_SESSION['tipo'] == 3){    //BODEGA
    if ($_SESSION['actual'] == 'add_item'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class="active"><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>
      <li class=><a href="sol_adq.php" class="sf-brick">Solicitar Adquisicion</a></li>';
    }

    else if ($_SESSION['actual'] == 'main'){
      echo '<li class="active"><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>
      <li class=><a href="sol_adq.php" class="sf-brick">Solicitar Adquisicion</a></li>';
    }

    else if ($_SESSION['actual'] == 'r_sol' || $_SESSION['actual'] == 're_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class="active"><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>
      <li class=><a href="sol_adq.php" class="sf-brick">Solicitar Adquisicion</a></li>';
    }

    else if ($_SESSION['actual'] == 'ver_item'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class="active"><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>
      <li class=><a href="sol_adq.php" class="sf-brick">Solicitar Adquisicion</a></li>';
    }

    else if ($_SESSION['actual'] == 'sol_adq'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>
      <li class="active"><a href="sol_adq.php" class="sf-brick">Solicitar Adquisicion</a></li>';
    }
  }

  else if ($_SESSION['tipo'] == 4){    //ADQUISICION
    if ($_SESSION['actual'] == 'add_item'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class="active"><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'gen_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class="active"><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'main'){
      echo '<li class="active"><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'r_sol' || $_SESSION['actual'] == 're_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class="active"><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if($_SESSION['actual'] == 'sol' || $_SESSION['actual'] == 'ver_sol'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class=><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class="active"><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }

    else if ($_SESSION['actual'] == 'ver_item'){
      echo '<li><a href="main.php" class="sf-house">Pagina Principal</a></li>
      <li class=><a href="add_item.php" class="sf-sign-add">Añadir Item</a></li>
      <li class="active"><a href="ver_item.php" class="sf-brick">Ver Items</a></li>
      <li class=><a href="ver_solicitudes.php" class="sf-monitor">Solicitudes</a></li>
      <li class=><a href="gen_solicitud.php" class="sf-file-excel">Generar Solicitud</a></li>
      <li class=><a href="r_solicitud.php" class="sf-monitor">Responder Solicitud</a></li>';
    }
  }
?>
