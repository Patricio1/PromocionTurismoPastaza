@extends('layouts.principal')
@section('content')
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
                                <p  style="color: #3cb04b">{{$sitios->DESCRIPCION}}</p>
                                <a href="javascript:mostrarDetalleSitioTuristico({{$sitios->LATITUD}},{{$sitios->LONGITUD}},{{$sitios->ID_SITIO}})" class="da-link button">Leear más</a>
                                <div class="da-img">
                                    <img src="{{$sitios->IMG}}" alt="{{$sitios->ALT}}" width="320" />
                                </div>
                             </div>                                                      
                            @endforeach




                  
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
                            <label for="" style="font-weight: bold;">CATEGORIAS</label>
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
                               <label for="" style="font-weight: bold;">SUB-CATEGORIAS</label>
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
                            <div class="span2 etiqueta">
                                Descripción:
                            </div>
                            <div id="dDescripcion" class="span10 fuente-black">
                               {{$sitio_random->DESCRIPCION}}
                            </div>

                        </div>
                         <div class="row-fluid">
                            <div class="span2 etiqueta">
                                Dirección:
                            </div>
                            <div id="dDireccion" class="span10 fuente-black">
                                 {{$sitio_random->DIRECCION}}
                            </div>

                        </div>
                       <strong style="color: black">Ubicación</strong>
                         <div class="row-fluid">
                            <div id="dLatitud" class="span6 fuente-black">
                                <strong> Latitud:</strong> {{$sitio_random->LATITUD}}
                            </div>
                            <div id="dLongitud" class="span6 fuente-black">
                              <strong> Longitud:</strong> {{$sitio_random->LONGITUD}}
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
                      
                       @endforeach
                        @else                           
                        <div class="row-fluid">
                          <div class="span1"><i class="twa twa-wink" title="" style="font-size: 25px"></i></div>
                          <div class="span1">5</div>
                          <div class="span10"> <span id="sSuccess" class="label label-success" style="width: 0%;text-align: center;" >0</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-smile" title="" style="font-size: 25px"></i></div>
                          <div class="span1">4</div>
                          <div class="span10">  <span id="sPrimary" class="label label-primary" style="width: 0%;text-align: center;background-color: #5bc0de;">0</span>  </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-confused" title="" style="font-size: 25px"></i></div>
                          <div class="span1">3</div>
                          <div class="span10">  <span id="sInfo" class="label label-info" style="width: 0%;background-color: #5bc0de;text-align: center;">0</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-worried" title="" style="font-size: 25px"></i><i class="em em-some-emoji"></i></div>
                          <div class="span1">2</div>
                          <div class="span10">  <span id="sWarning" class="label label-warning" style="width: 0%;text-align: center;">0</span> </div>
                       </div>
                       <div class="row-fluid">
                          <div class="span1"><i class="twa twa-cry" title="" style="font-size: 25px"></i> </div>
                          <div class="span1">1</div>
                          <div class="span10"> <span id="sDanger" class="label label-danger" style="width: 0%;background-color: #d9534f;text-align: center;">0</span> </div>
                       </div>
                        @endif
                    </div>
                    <div class="span3">
                      <!--   <button class="btn btn-primary">Compartir en facebook</button>-->
                    </div>
                </div> <br><br>
                <!--Fin Seccion Cuadro calificacion -->
                <div class="row-fluid">  

                    <div class="span1 etiqueta">
                       Teléfono:
                    </div>                 
                    <div id="dTelefono" class="span1 fuente-black">
                       {{$sitio_random->TELEFONO}}
                    </div>
                     <div class="span1 etiqueta">
                      Celular:
                    </div> 
                    <div id="dCelular" class="span1 fuente-black">
                     {{$sitio_random->CELULAR}}
                    </div>
                    <div class="span1 etiqueta">
                      Email:
                    </div>
                    <div id="dEmail" class="span3 fuente-black">
                      {{$sitio_random->EMAIL}}
                    </div>
                    <div  class="span2 fuente-black">
                      <strong> Última actualización:</strong>
                    </div>
                    <div id="dFecha" class="span2 fuente-black">
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
                           <h1>Muy pronto nuestra app oficial</h1>
                             <p class="large-text">Si te gustó nuestro portal web te gustará más aún nuestra aplicación móvil.</p>                            
                            <p style="text-align: justify;" class="fuente-black">Nuestra aplicación móvil está orientada a la plataforma android <i class="fa fa-android" aria-hidden="true" style="font-size: 25px;color: #4CAF50"></i> y tendrá características similares a la de éste portal web, podrás descargarla muy pronto y totalmente gratis.</p>
                              <a id="descarga" href="#" class="button" ><i class="fa fa-download" aria-hidden="true" style="font-size: 25px;"></i> Descargar</a>
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
                @foreach($categoriasDestacadas as $cdestacados)
                 <li>{{$cdestacados->CATEGORIA}}</li>
                @endforeach                   
                </ul>
            </div>
            <div class="span4">
            Sitios destacados <i class="fa fa-star-o" aria-hidden="true"></i>
                 <ul class="unstyled">
                 @foreach($sitiosMasCalificados as $sdestacados)
                 <li>{{$sdestacados->SITIO}}</li>
                @endforeach                     
                </ul>
            </div>
        </div>
            <p>&copy; 2017</p>
        </div>
        <!-- Footer section end -->

       
<script src="recursos_publico/js/poligonoPastaza.js"></script>
<script src="recursos_publico/js/funcionesAJAX.js"> </script>
<script src="recursos_publico/js/funcionesVarias.js"></script>    
@stop