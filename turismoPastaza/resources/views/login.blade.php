<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Formulario de Sesión</title>  
  <link rel="stylesheet" type="text/css" href="recursos_publico/login-form/styles.css">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=ABeeZee:400,400italic">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script type="text/javascript" src="recursos_publico/login-form/formslider.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
<div id="fondo"  style="background-color: gray">
  <div id="w" >
    <h1>Inicie sesión/Registre su cuenta</h1>
    
    <div id="page">
      <div id="content-login">
        <h2>INICIAR SESIÓN  <a href="/"><i style="float: right;margin-right: 20px;margin-top: 1px;font-size: 39px;color: white" class="fa fa-home" aria-hidden="true"></i></a></h2>
        <div class="content">
          <a href="#" class="slidelink" id="showregister">¿Aún no te has registrado? Registrate aquí &rarr;</a>
          <form id="login" name="login" action="#" method="post">
            <label for="email">Usuario</label>
            <input type="text" name="email" id="email" class="txtfield" tabindex="1" autocomplete="off" required>
            
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" class="txtfield" tabindex="2" autocomplete="off" required>
            
            <input type="submit" name="loginbtn" id="loginbtn" value="Ingresar" class="btn" tabindex="3">
          </form>
        </div>
      </div><!-- /end #content-login -->
      
      
      <div id="content-register">
        <h2>REGISTRAR CUENTA  <a href="/"><i style="float: right;margin-right: 20px;margin-top: 1px;font-size: 39px;color: white" class="fa fa-home" aria-hidden="true"></i></a></h2>
        <div class="content">
        <a href="#" class="leftsidelink" id="showlogin">&larr; ¿Ya estas registrado? Inicar sesión!</a>
        <form id="register" name="register" action="#" method="post">
          <label for="fname">Nombre</label>
          <input type="text" name="fname" id="fname" class="txtfield" tabindex="4" autocomplete="off" required>
          
          <label for="lname">Apellido</label>
          <input type="text" name="lname" id="lname" class="txtfield" tabindex="5" autocomplete="off" required>
          
          <label for="newemail">Correo</label>
          <input type="email" name="newemail" id="newemail" class="txtfield" tabindex="6" autocomplete="off" required>
          
          <label for="password1">Contraseña</label>
          <input type="password" name="password1" id="password1" class="txtfield" tabindex="7" autocomplete="off" required>
          
          <label for="password2">Repita Contraseña</label>
          <input type="password" name="password2" id="password2" class="txtfield" tabindex="8" autocomplete="off" required>
          
          <input type="submit" name="registerbtn" id="registerbtn" value="Registrar" class="btn" tabindex="9">
        </form>
        </div>
      </div><!-- /end #content-register -->
      
    </div><!-- /end #page -->
  </div><!-- /end #w -->
  </div>
</body>
</html>