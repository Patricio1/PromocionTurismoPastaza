<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Turismo-Pastaza</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->

        <link rel="stylesheet" type="text/css" href="recursos_publico/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="recursos_publico/css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="recursos_publico/css/style.css" />
        <link rel="stylesheet" type="text/css" href="recursos_publico/css/pluton.css" />

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="recursos_publico/css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="recursos_publico/css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="recursos_publico/css/animate.css" />
        <!-- Fav and touch icons -->
        <link href="recursos_publico/css/emoticons/twemoji-awesome.css" rel="stylesheet">
        <link href="recursos_publico/css/emoticons/demo.css" rel="stylesheet">
      

        <!--Resources for leaftlet library -->    
       

     <!--<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />-->
      <link rel="stylesheet" href="recursos_publico/css/leaftlet/leaflet.css" />

    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
    <script src="http://leaflet-extras.github.io/leaflet-providers/leaflet-providers.js"></script>


    <script src="recursos_publico/css/leaftlet/dist/BoundaryCanvas.js"></script>
 <link rel="stylesheet" href="recursos_publico/css/leaftlet/dist/leaflet.awesome-markers.css">
       

        <script src="recursos_publico/css/leaftlet/dist/leaflet.awesome-markers.js"></script>
        <style>
            .servicios img
            {            
    width: 400px;
    height: 200px;
            }
           .etiqueta
            {
                color: #181A1C;
                font-weight: bold;
            }
            .fuente-black
                {
                   color: #181A1C;
                }            
        </style>
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <!--<img src="images/location.png" width="10px" alt="Logo" />-->
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active"><a href="#inicio">Inicio</a></li>
                            <li><a href="#mapa">Mapa</a></li>
                            <li><a href="#detalle">Detalles</a></li>
                            <li><a href="#servicios">Servicios</a></li>
                            <li><a href="#calificar">Calificar</a></li>
                            <li><a href="#acercade">Acerca de</a></li>
                            <li><a href="#descargarapp">Descarga la App</a></li>
                            <li><a href="javascript:void();">Iniciar Sesión</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>

 <script type="text/javascript" src="recursos_publico/js/jquery.js"></script>
        <script type="text/javascript" src="recursos_publico/js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="recursos_publico/js/bootstrap.js"></script>
        <script type="text/javascript" src="recursos_publico/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="recursos_publico/js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="recursos_publico/js/jquery.cslider.js"></script>
        <script type="text/javascript" src="recursos_publico/js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="recursos_publico/js/jquery.inview.js"></script>        
        <script type="text/javascript" src="recursos_publico/js/app.js"></script>
 @yield('content')

     
       
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
       

    </body>
</html>