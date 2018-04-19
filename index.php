<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-clearmin.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/roboto.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <title>GPI - Login</title>
    <style></style>
  </head>
  <body class="cm-login">

    <div class="text-center" style="padding:90px 0 30px 0;background:#fff;border-bottom:1px solid #ddd">
      <img src="assets/img/GPI-LOGO.png" width="150" height="150">
    </div>

    <div class="col-sm-6 col-md-4 col-lg-3" style="margin:40px auto; float:none;">
      <form method="POST" action="proc/login.php">
	<div class="col-xs-12">
          <div class="form-group">
	    <div class="input-group">
	      <div class="input-group-addon"><i class="fa fa-fw fa-user"></i></div>
	      <input type="text" name="user" class="form-control" placeholder="Usuario">
	    </div>
          </div>
          <div class="form-group">
	    <div class="input-group">
	      <div class="input-group-addon"><i class="fa fa-fw fa-lock"></i></div>
	      <input type="password" name="pass" class="form-control" placeholder="Contraseña">
	    </div>
          </div>
        </div>
	<!--<div class="col-xs-6">
          <div class="checkbox"><label><input type="checkbox"> Recordarme</label></div>
	</div>--><div class="col-xs-12">
          <button type="submit" class="btn btn-block btn-gpi">Iniciar Sesión</button>
        </div>
      </form>
    </div>
  </body>
</html>
