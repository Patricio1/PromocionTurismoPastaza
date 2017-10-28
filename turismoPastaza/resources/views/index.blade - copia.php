@extends('layouts.principal')
@section('content')
<style type="text/css">
    .form-signin
{
    width: 100%;
    max-width: 90%;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 10px;
    padding: 20px 0px 20px 0px;
   /** background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
    /*-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
   /* box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
</style>
<!-- Inicion Seccion slider -->
        <div id="inicio">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    
                            @foreach ($sitiosTuristicosRecientes as $sitios)                           
                             <div class="da-slide">
                                <h2 class="fittext2">{{$sitios->NOMBRE}}</h2>
                                <h4>{{$sitios->DIRECCION}}</h4>
                                <p>{{$sitios->DESCRIPCION}}</p>
                                <a href="javascript:mostrarDetalleSitioTuristico({{$sitios->LATITUD}},{{$sitios->LONGITUD}},{{$sitios->ID_SITIO}})" class="da-link button">Leear más</a>
                                <div class="da-img">
                                    <img src="{{$sitios->IMG}}" alt="{{$sitios->ALT}}" width="320" />
                                </div>
                             </div>                                                      
                            @endforeach




                   <!--  <div class="da-slide">
                        <h2 class="fittext2">Atractivo Turistico NN</h2>
                        <h4>Dirección aquí...</h4>
                        <p>Detalle del atractivo turistico aquí....</p>
                        <a href="#" class="da-link button">Leear más</a>
                        <div class="da-img">
                           <img src="images/Team1.png" alt="image01" width="320">
                        </div>
                    </div>-->
                    <!-- End first slide -->
                    <!-- Start second slide -->
                  <!--  <div class="da-slide">
                        <h2>Atractivo Turístico XXX</h2>
                        <h4>Dirección aquí..</h4>
                        <p>Detalle del atractivo turistico aquí.....</p>
                        <a href="#" class="da-link button">Leer más</a>
                        <div class="da-img">
                            <img src="images/Team1.png" width="320" alt="image02">
                        </div>
                    </div>-->
                    <!-- End second slide -->
                    <!-- Start third slide -->
                    <!-- <div class="da-slide">
                        <h2>Atractivo Turístico YYY</h2>
                        <h4>Dirección aquí....</h4>
                        <p>Detalle del atractivo turístico aquí...</p>
                        <a href="#" class="da-link button">Leer más</a>
                        <div class="da-img">
                           <img src="images/Team1.png" width="320" alt="image03">
                        </div>
                    </div>-->
                    <!-- Start third slide -->
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!--Fin Seccion slider -->

         <!-- Mapa section start -->
        <div class="section primary-section" id="mapa">
            <div class="container">            
                <!-- Start title section -->
                <div class="title">
                    <h1>¿Qué lugar te gustaría visitar?</h1>
                    <!-- Section's title goes here -->
                    <!--<p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>-->
                    <div class="row-fluid">

                        <div class="span2">
                            <label for="">CATEGORIAS</label>
                        </div>
                        <div class="span4">

                    <select name="ddlcategoria" id="ddlcategoria">
                            <option value="" selected>--Todas las categorías--</option>
                            @foreach ($categorias as $categoria)
                             <option value="{{$categoria->ID}}|{{$categoria->ICONO}}">{{$categoria->NOMBRE}}</option>                                                 
                            @endforeach                                                   
                      </select>
                        </div>
                        <div class="span2">
                               <label for="">SUB-CATEGORIAS</label>
                        </div>
                        <div class="span4">
                            <select name="ddlsubcategoria" id="ddlsubcategoria">                    
                      </select>
                        </div>
                    </div>                                                            
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
                    <div class="span12">                      
                            
                               <div id="map" style="width: 100%; height: 500px;margin-top: 10px"></div>
                            
                            <!--<h3>Modern Design</h3>
                            <p>We Create Modern And Clean Theme For Your Business Company.</p>  -->                  
                    </div>                                      
                </div>
            </div>
        </div>
        <!-- Mapa section end -->

         <!-- Detalles section start -->
        <div class="section secondary-section" id="detalle">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                @foreach ($sitioRandom as $sitio_random)
                 <p id="idSitio" class="hidden">{{$sitio_random->ID_SITIO}}</p>
                    <h1 id="dNombre">{{$sitio_random->NOMBRE}}</h1>                 
                   <!-- <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>-->
                </div>                             
                <div class="row-fluid">
                    <div class="span8">                        
                        <div class="row-fluid">
                            <div class="span2">
                                Descripción:
                            </div>
                            <div id="dDescripcion" class="span10">
                               {{$sitio_random->DESCRIPCION}}
                            </div>

                        </div>
                         <div class="row-fluid">
                            <div class="span2">
                                Dirección:
                            </div>
                            <div id="dDireccion" class="span10">
                                 {{$sitio_random->DIRECCION}}
                            </div>

                        </div>
                        Ubicación
                         <div class="row-fluid">
                            <div id="dLatitud" class="span6">
                                 Latitud: {{$sitio_random->LATITUD}}
                            </div>
                            <div id="dLongitud" class="span6">
                               Longitud: {{$sitio_random->LONGITUD}}
                            </div>                            

                        </div>
                    </div>
                    <div  class="span4">
                      <img id="dImagenSitio" src="{{$sitio_random->IMG}}" alt="{{$sitio_random->ALT}}" />
                    </div>
                </div>
                
                <br><br>
                <!--Inicio Seccion Cuadro calificacion -->
                <div class="row-fluid">
                <div class="span4"></div>
                <div class="span4">
                         
                            <h1 style="font-size:23px"> Calificación</h1>
                                    
                </div>
                <div class="span4"></div>                   
                </div>
                <div class="row-fluid">
                    <div class="span1">                        
                    </div>
                    <div class="span2"> 
                        <div class="row-fluid">
                            <div class="span12">
                            @if(count($calificacion)>0)
                              <p id="pPromedio" style="font-size: 40px">{{$promedioCalificacion}}</p>
                            @else                           
                             <p id="pPromedio" style="font-size: 40px"></p>
                            @endif 
                               <br>
                            </div>
                        </div> 
                        <div class="row-fluid">
                                    <div class="span4">
                                        <i class="fa fa-users" aria-hidden="true" style="color: black;font-size: 40px"></i>
                                    </div>                                              
                                    <div class="span8"><p id="pTotalCalificacion" style="font-size: 10px;color: black">{{$totalCalificacion}} en total</p></div>
                        </div>                         
                    </div>
                    <div class="span6">

                          @if(count($calificacion)>0)                                                      
                    @foreach ($calificacion as $calificacion_sitio)
                        <div class="row-fluid">
                          <div class="span1"><i class="{{$calificacion_sitio->ICONO}}" title="{{$calificacion_sitio->NOMBRE}}" style="font-size: 25px"></i></div>
                          <div class="span1">{{$calificacion_sitio->VALOR}}</div>
                          <div class="span10"> 
                           @if(floatval($calificacion_sitio->VALOR)==5)
                            <span id="sSuccess" class="label label-success" style="width: {{($calificacion_sitio->CALIFICACION*100)/$calificacionMaxima}}%;text-align: center;" >
                          {{$calificacion_sitio->CALIFICACION}}</span> 
                          @elseif(floatval($calificacion_sitio->VALOR)==4)                            
                           <span id="sPrimary" class="label label-primary" style="width: {{($calificacion_sitio->CALIFICACION*100)/$calificacionMaxima}}%;text-align: center;background-color: #5bc0de;" >
                          {{$calificacion_sitio->CALIFICACION}}</span> 
                            @elseif(floatval($calificacion_sitio->VALOR)==3)                            
                           <span id="sInfo" class="label label-info" style="width: {{($calificacion_sitio->CALIFICACION*100)/$calificacionMaxima}}%;text-align: center;" >
                          {{$calificacion_sitio->CALIFICACION}}</span> 
                            @elseif(floatval($calificacion_sitio->VALOR)==2)                            
                           <span id="sWarning" class="label label-warning" style="width: {{($calificacion_sitio->CALIFICACION*100)/$calificacionMaxima}}%;text-align: center;" >
                          {{$calificacion_sitio->CALIFICACION}}</span> 
                            @else                            
                           <span id="sDanger" class="label label-danger"  style="width: {{($calificacion_sitio->CALIFICACION*100)/$calificacionMaxima}}%;text-align: center;background-color: #d9534f;" >
                          {{$calificacion_sitio->CALIFICACION}}</span> 
                            @endif                         
                          </div>
                        </div>
                       <!--<div class="row-fluid">
                          <div class="span1"><i class="twa twa-wink" title=":heart:" style="font-size: 25px"></i></div>
                          <div class="span1">5</div>
                          <div class="span10"> <span class="label label-success" style="width: 100%;text-align: center;" >50</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-smile" title=":heart:" style="font-size: 25px"></i></div>
                          <div class="span1">4</div>
                          <div class="span10">  <span class="label label-primary" style="width: 80%;text-align: center;">41</span>  </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-confused" title=":heart:" style="font-size: 25px"></i></div>
                          <div class="span1">3</div>
                          <div class="span10">  <span class="label label-info" style="width: 76%;background-color: #5bc0de;text-align: center;">38</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-worried" title=":heart:" style="font-size: 25px"></i><i class="em em-some-emoji"></i></div>
                          <div class="span1">2</div>
                          <div class="span10">  <span class="label label-warning" style="width: 8%;text-align: center;">4</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-cry" title=":heart:" style="font-size: 25px"></i> </div>
                          <div class="span1">1</div>
                          <div class="span10"> <span class="label label-danger" style="width: 4%;background-color: #d9534f;text-align: center;">2</span> </div>
                       </div>-->
                       @endforeach
                        @else                           
                        <div class="row-fluid">
                          <div class="span1"><i class="twa twa-wink" title=":heart:" style="font-size: 25px"></i></div>
                          <div class="span1">5</div>
                          <div class="span10"> <span class="label label-success" style="width: 0%;text-align: center;" >0</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-smile" title=":heart:" style="font-size: 25px"></i></div>
                          <div class="span1">4</div>
                          <div class="span10">  <span class="label label-primary" style="width: 0%;text-align: center;">0</span>  </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-confused" title=":heart:" style="font-size: 25px"></i></div>
                          <div class="span1">3</div>
                          <div class="span10">  <span class="label label-info" style="width: 0%;background-color: #5bc0de;text-align: center;">0</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-worried" title=":heart:" style="font-size: 25px"></i><i class="em em-some-emoji"></i></div>
                          <div class="span1">2</div>
                          <div class="span10">  <span class="label label-warning" style="width: 0%;text-align: center;">0</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-cry" title=":heart:" style="font-size: 25px"></i> </div>
                          <div class="span1">1</div>
                          <div class="span10"> <span class="label label-danger" style="width: 0%;background-color: #d9534f;text-align: center;">0</span> </div>
                       </div>
                        @endif
                    </div>
                    <div class="span3">
                         <button class="btn btn-primary">Compartir en facebook</button>
                    </div>
                </div> <br><br>
                <!--Fin Seccion Cuadro calificacion -->
                <div class="row-fluid">                   
                    <div id="dTelefono" class="span2">
                       Teléfono: {{$sitio_random->TELEFONO}}
                    </div>
                    <div id="dCelular" class="span2">
                      Celular: {{$sitio_random->CELULAR}}
                    </div>
                    <div id="dEmail" class="span4">
                     Email: {{$sitio_random->EMAIL}}
                    </div>
                    <div  class="span2">
                       Última actualización:
                    </div>
                    <div id="dFecha" class="span2">
                         {{$sitio_random->ULTIMA_EDICION}}
                    </div> 
                     @endforeach                   
                </div>
            </div>
        </div>
        <!-- Detalles section end -->

         <!-- Servicios section start -->
        <div class="section primary-section " id="servicios">
            <div class="triangle"></div>
            <div class="container" id="container">
                <div class=" title">
                    <h1>Servicios</h1>
                    <p id="pNombreSitio"></p>
                </div>                    
                    <ul id="portfolio-grid" class="thumbnails row">

                    @foreach($serviciossitio as $servicio)
                    <li class="span4 mix web">
                            <div class="thumbnail servicios">
                                <img src="{{$servicio->IMAGEN}}" alt="{{$servicio->ALT}}" >
                                
                                <h3>{{$servicio->NOMBRE}}</h3>
                                @if($servicio->PRECIO>0)
                                 <p>  $ {{$servicio->PRECIO}}</p> 
                                 @else  <p>  Gratis</p> 
                                @endif
                                                              
                            </div>
                        </li>
                    @endforeach

                                                                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- Servicios section end -->

         <!-- Calificacion section start -->
        <div id="calificar" class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1>Califica este atractivo turístico</h1>
                    <p>Tu calificación es muy importante como referencia para otros usuarios.</p>
                </div>

                <div class=" row-fluid">

                    <div class="span2 ">  
                     
                   
                    </div>
                    <div class="span8 price-column" id="seccionCalificar">
                        <h3>CALIFICACIÓN</h3>

                        @foreach($filtrosCalificacion as $filtros)                        
                          <div class="row-fluid" style="border-bottom: 1px solid #747C89;margin-top: 30px;padding-bottom: 15px;">
                              <div class="span2"></div>
                              <div class="span2">
                                   <img id="{{$filtros->ID}}" src="recursos_publico/images/uncheck.png" width="25px" height="25px" alt="Click para seleccionar" onclick="javascript:cambiarimage(this.src,this.id)">  
                                </div>
                              <div class="span4" style="color: #747C89;font-size: 31px"> {{$filtros->NOMBRE}} </div>
                              <div class="span2"><i class="{{$filtros->ICONO}}" title="{{$filtros->NOMBRE}}" style="font-size: 25px"></i></div>
                              <div class="span2"></div>
                          </div>
                        @endforeach

                 <!-- <div class="row-fluid" style="border-bottom: 1px solid #747C89;margin-top: 30px;padding-bottom: 15px;">
                      <div class="span2"></div>
                      <div class="span3">
                            
                        </div>
                      <div class="span3" style="color: #747C89;font-size: 31px"> Excelente </div>
                      <div class="span2"><i class="twa twa-wink" title=":heart:" style="font-size: 25px"></i></div>
                      <div class="span2"></div>
                  </div>

                   <div class="row-fluid" style="border-bottom: 1px solid #747C89;margin-top: 30px;padding-bottom: 15px;">
                      <div class="span2"></div>
                      <div class="span3">
                           <!-- <img id="imgmuybien" src="images/uncheck.png" width="25px" height="25px" alt="" onclick="javascript:cambiarimage(this.src,this.id)"> 
                        </div>
                      <div class="span3" style="color: #747C89;font-size: 31px"> Muy Bueno </div>
                      <div class="span2"> <i class="twa twa-smile" title=":heart:" style="font-size: 25px"></i></div>
                      <div class="span2"></div>
                  </div>

                  <div class="row-fluid" style="border-bottom: 1px solid #747C89;margin-top: 30px;padding-bottom: 15px;">
                      <div class="span2"></div>
                      <div class="span3">
                           
                        </div>
                      <div class="span3" style="color: #747C89;font-size: 31px"> Bueno </div>
                      <div class="span2"><i class="twa twa-confused" title=":heart:" style="font-size: 25px"></i></div>
                      <div class="span2"></div>
                  </div>

                  <div class="row-fluid" style="border-bottom: 1px solid #747C89;margin-top: 30px;padding-bottom: 15px;">
                      <div class="span2"></div>
                      <div class="span3">
                            
                        </div>
                      <div class="span3" style="color: #747C89;font-size: 31px"> Malo </div>
                      <div class="span2"><i class="twa twa-worried" title=":heart:" style="font-size: 25px"></i></div>
                      <div class="span2"></div>
                  </div>

                  <div class="row-fluid" style="border-bottom: 1px solid #747C89;margin-top: 30px;padding-bottom: 15px;">
                      <div class="span2"></div>
                      <div class="span3">
                           
                        </div>
                      <div class="span3" style="color: #747C89;font-size: 31px"> Pésimo </div>
                      <div class="span2"><i class="twa twa-cry" title=":heart:" style="font-size: 25px"></i></div>
                      <div class="span2"></div>
                  </div> -->    
                            <div id="estadoCalificacion" class="alert alert-danger alert-dismissable" role="alert" style="margin-top: 20px;margin-right: 20px;margin-left: 20px">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                           
                            </div>      
                        <a style="margin-top: 20px" href="javascript:verificarMarcado();" class="button button-ps"><i class="fa fa-check" style="font-size: 25px;" aria-hidden="true"></i> CALIFICAR</a>
                    </div>
                    <div class="span2">                       
                    </div>
                </div>                
            </div>
        </div>
        <!-- Calificacion section end -->

         <!-- Acerca de section start -->
        <div class="section primary-section" id="acercade">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1>Acerca de este portal</h1>                   
                </div>
                <div class="row-fluid team">
                    <div class="span2"></div>
                   <div class="span8">
                        <div class="highlighted-box center" style="text-align: justify;">                          
                            <p>Acerca de Turismo - Pastaza</p>
                            <p>Este es un proyecto que tiene como propósito promocionar los atractivos turísticos dentro de la Provincia de Pastaza para que así mucha más gente pueda conocer o visitarlos.</p>
                            <p>Así que si eres propietario de algún atractivo turístico dentro de la localidad de Pastaza regístrate totalmente gratis 
                            <a href="#"><strong>aquí</strong> </a> y empieza a promocionar tus sitios turísticos YA</p>
                           
                        </div>
                    </div>
                    <div class="span2"></div>
                </div>                
            </div>
        </div>
        <!-- Acerca de section end -->

         <!-- Descargar app section start -->
        <div class="section secondary-section" id="descargarapp">
            <div class="triangle"></div>
            <div class="container centered">
             <div class="row-fluid team">
                    <div class="span2"></div>
                   <div class="span8">
                        <div class="center">                          
                           <h1>Descarga nuestra app oficial</h1>
                             <p class="large-text">Si te gustó nuestro portal web te gustará más aún nuestra aplicación móvil.</p>                            
                            <p style="text-align: justify;">Nuestra aplicación móvil está orientada a la plataforma android <i class="fa fa-android" aria-hidden="true" style="font-size: 25px;color: #4CAF50"></i> y tiene características similares a la de éste portal web, puedes descargarla totalmente gratis.</p>
                              <a href="#" class="button"><i class="fa fa-download" aria-hidden="true" style="font-size: 25px;"></i> Descargar</a>
                        </div>
                    </div>
                    <div class="span2"></div>
                </div>                                                          
            </div>
        </div>
        <!-- Descargar app section end -->




         <!-- Footer section start -->
        <div class="footer">
        
        <div class="row-fluid" style="padding-top: 30px">
            <div class="span4"></div>
            <div class="span4">
                <ul class="unstyled">Categorías destacadas <i class="fa fa-star-o" aria-hidden="true"></i>
                    <li>Categoría 1</li>
                    <li>Categoría 2</li>
                    <li>Categoría 3</li>
                </ul>
            </div>
            <div class="span4">
            Sitios destacadas <i class="fa fa-star-o" aria-hidden="true"></i>
                 <ul class="unstyled">
                    <li style="none">Sitio turístico 1</li>
                    <li>Sitio turístico 2</li>
                    <li>Sitio turístico 3</li>
                </ul>
            </div>
        </div>
            <p>&copy; 2017</p>
        </div>
        <!-- Footer section end -->

        <script type="text/javascript">
        $("#estadoCalificacion").hide();
            function cambiarimage(recurso, id)
            {
                var array = recurso.split('/');
                var imageUncheck = 'recursos_publico/images/uncheck.png';
                var imageCheck = 'recursos_publico/images/check.png';
                var imageCurrent = array[array.length-1];
                //metodo para cambiar la imagen check por uncheck
                auxiliar(imageCurrent, imageCheck, id,imageUncheck);
                //metodo para permitir la seleccion de un unico elemento
                uncheck(id,imageUncheck);               

            }
            function auxiliar(imgactual, imgcheck, imgid, imguncheck)
            {              
                 if(imgactual==imgcheck)
                    $('#'+imgid).attr("src",imguncheck);
                else  $('#'+imgid).attr("src",imgcheck);
            }
            function uncheck(id, imguncheck)
            {               
                    var images = [];
                    $("#seccionCalificar img").each(function(){
                        var elementoActual = $(this).attr('id');
                        if(elementoActual!=id) //solo si no es el mismo elemento donde se dispara el evento click
                        {
                             $('#'+elementoActual).attr("src",imguncheck);
                        }                       
                    });                          
            }
            function verificarMarcado()
            {                           
                var imagecheck = 'check.png';   
                var isMarcado=false;  
                var valorMarcado=0;                          

                $("#seccionCalificar img").each(function(){                    
                    var array = ($(this).attr('src')).split('/');
                    var imageCurrent = array[array.length-1];
                    if(imageCurrent==imagecheck)
                    {                      
                       isMarcado = true;
                       valorMarcado = $(this).attr('id');
                    }
                });
                if(isMarcado)
                {
                    //console.log('Opcion marcado: '+valorMarcado);
                    var idSitio = $("#idSitio").text();
                    calificar(idSitio,valorMarcado);
                    //prueba con datos que generan error
                   // calificar(34,120);
                }
                else
                {
                            $("#estadoCalificacion").show();
                             $("#estadoCalificacion").text('Por favor seleccione una opción  ');
                             var clase = 'alert alert-warning alert-dismissable';
                              $("#estadoCalificacion").attr('class',clase);
                             var icon= '<i class="fa fa-info-circle" title="OK" style="font-size: 25px"></i>';
                             $("#estadoCalificacion").append(icon);
                }
            }

            function calificar(sitio,filtro)
            {

            var idSitio = sitio;
            var idFiltro = filtro;                         
                $.ajax({
                    type: "GET",       
                    url: 'calificar/'+idSitio+'/'+idFiltro,                   
                    success: function(data)
                    {
                        console.info(data);
                        if(data=='OK')
                        {
                             $("#estadoCalificacion").show();
                             $("#estadoCalificacion").text('Gracias por su calificación  ');
                             var clase = 'alert alert-success alert-dismissable';
                              $("#estadoCalificacion").attr('class',clase);
                             var icon= '<i class="fa fa-thumbs-up" title="OK" style="font-size: 25px"></i>';
                             $("#estadoCalificacion").append(icon);

                        }
                        else
                        {
                             $("#estadoCalificacion").show();
                             $("#estadoCalificacion").text('Calificación no fallida  ');
                              var clase = 'alert alert-danger alert-dismissable';
                              $("#estadoCalificacion").attr('class',clase);
                              var icon= '<i class="fa fa-thumbs-down" title="FALLIDO" style="font-size: 25px"></i>';
                             $("#estadoCalificacion").append(icon);

                        }
                       // listar();
                        
                    },
                    error:function(xhr){
                       // console.info(xhr);
                       $("#estadoCalificacion").show();
                             $("#estadoCalificacion").text('Calificación no permitida  ');
                              var clase = 'alert alert-danger alert-dismissable';
                              $("#estadoCalificacion").attr('class',clase);
                              var icon= '<i class="fa fa-exclamation-triangle" title="FALLIDO" style="font-size: 25px"></i>';
                             $("#estadoCalificacion").append(icon);
                    }
                });
            }
        </script>

<script src="recursos_publico/js/poligonoPastaza.js"></script>

  <script src="recursos_publico/js/funcionesAJAX.js"> </script>

    <script>
$("#pNombreSitio").text($("#dNombre").text()+' pone a tu disposición los siguientes servicios.');
$("#myModal").hide();
function hacervisiblemodal()
{
    //var clase = 'class="modal fade"';
    $("#myModal").show();
}
    /**function listarSitiosTuristicosPorCategoria(categoria)
    {      
       /** var categoriaSelected = $("#ddlcategoria" ).val().split('|');    
        var categoriaIcon = categoriaSelected[1];
        var categoriaId = categoriaSelected[0];
        var iconMarker="";
        if(categoriaId.length>0)
        {           
            var subcategoriaSelected = $("#ddlsubcategoria" ).val().split('|');  
            var subcategoriaIcon = subcategoriaSelected[1];
            var subcategoriaId = subcategoriaSelected[0];
            if(subcategoriaId.length>0)
            {
               iconMarker = subcategoriaIcon;
            }
             else iconMarker = categoriaIcon;    
        }

          
     
            $.ajax({
                type: "GET",
                url: 'sitios_turisticos_by_categoria/'+categoria,
                success: function(data,status,xhr)
                {                       
                    $.each(data, function(array,referencia){
                         var icono="";                         
                         var color='';
                         var nombre="";
                         var Latitud=0;
                         var Longitud=0;
                        $.each(referencia,function(clave,valor)
                        {
                            switch(clave)
                            {
                                case 'NOMBRE':
                                nombre = valor;
                                break;
                                case 'LATITUD':
                                Latitud = parseFloat(valor);
                                break;
                                case 'LONGITUD':
                                Longitud = parseFloat(valor);                        
                                break;
                                case 'ICONO':
                                var iconoclass = valor.split('-');
                                icono = iconoclass[0];
                                color = iconoclass[1];
                                break;
                            }                                                                        
                          // console.log(clave+" : "+valor);                           
                        });                      
                       marker1 = L.marker([Latitud,Longitud], {icon: L.AwesomeMarkers.icon({icon: icono, prefix: 'fa', markerColor: color}) }).addTo(map).bindPopup(nombre+"<br>"+'<a class="jumper" href="#detalle";>Ver detalles..</a>');
                    });
                   
                },
                error: function(xhr, status, error)
                {
                    console.info(xhr);
                    console.info(status);
                    console.info(error);
                }
            });
    }*/
    </script>
        <script type="text/javascript">
function verdetalle(lugar)
    {
   //  Object.keys(lugar).forEach(function(key){
     //   console.log(lugar[key]);
      //})
     // window.location = "#detalle";
    }

$(".jumper").on("click", function( e ) {
    
    e.preventDefault();

    $("body, html").animate({ 
        scrollTop: $( $(this).attr('href') ).offset().top 
    }, 600);
    
});

    var map = L.map('map').setView([-1.7109, -76.9482], 9);
    map.options.minZoom = 8;

    
    var withBoundary = function(providerName) {
        return L.TileLayer.BoundaryCanvas.createFromLayer(
            L.tileLayer.provider(providerName),
            {boundary: geom, trackAttribution: true}
        )
    }
   

listarTodosSitiosTuristicos();

/**marker1 = L.marker([-2.081,-77.338], {icon: L.AwesomeMarkers.icon({icon: 'home', prefix: 'fa', markerColor: 'darkgreen'}) }).addTo(map).bindPopup("Lugar Turistico 4 <br>"+'<a class="jumper" href="#detalle";>Ver detalles..</a>');
  marker2 =  L.marker([-1.2305,-77.3101], {icon: L.AwesomeMarkers.icon({icon: 'bed', prefix: 'fa', markerColor: 'darkblue'}) }).addTo(map).bindPopup("Lugar Turistico 5 <br>"+'<a href=javascript:verdetalle(objeto);>Ver detalles..</a>');

  marker3 = L.marker([-1.3155, -77.6816], {icon: L.AwesomeMarkers.icon({icon: 'spinner', prefix: 'fa', markerColor: 'red', spin:true}) }).addTo(map).bindPopup("Lugar Turistico 1 <br>"+'<a href=javascript:verdetalle(objeto);>Ver detalles..</a>');
  marker4 =  L.marker([-1.3841, -78.0331], {icon: L.AwesomeMarkers.icon({icon: 'coffee', prefix: 'fa', markerColor: 'red', iconColor: '#f28f82'}) }).addTo(map).bindPopup("Lugar Turistico 2 <br>"+'<a href=javascript:verdetalle(objeto);>Ver detalles..</a>');*/
    try{
        L.control.layers({
        'OpenStreetMap.HOT': withBoundary('OpenStreetMap.HOT').addTo(map),
        'Stamen.Watercolor': withBoundary('Stamen.Watercolor'),
        'Esri.WorldStreetMap': withBoundary('Esri.WorldStreetMap'),
        'MapQuestOpen.Aerial': withBoundary('MapQuestOpen.Aerial')
    }, null, {collapsed: false}).addTo(map);
   
    }catch(err) {
  
}  
    </script>
  
         <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #1b95e0">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Iniciar sesión</h4>
        </div>
        <div class="modal-body">    
    <div class="row-fluid" style="width: 100%">
        <div class="span12">           
            <div class="account-wall">
               <!-- <img class="profile-img" src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png"
                    alt="">-->
                    <li class="fa fa-user profile-img" style="color: black;font-size: 70px"></li>
                <form class="form-signin">
                <input type="text" class="form-control" placeholder="Escriba su nombre de usuario.." required autofocus style="width: 100%">
                <input type="password" class="form-control" placeholder="Escriba su contraseña.." required style="width: 100%">
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                   Ingresar</button>                               
                </form>
            </div>
            <a href="#" class="text-center new-account">Crear una cuenta </a>
        </div>
    </div>
        </div>
        <div class="modal-footer" style="background-color: #90caf9">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
@stop