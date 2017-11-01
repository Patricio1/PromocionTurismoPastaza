
 var markers = new Array();
$("#ddlcategoria").on('change',function(e){      
        var valueSelected = this.value;
        var categoriaSelected = valueSelected.split('|');
        var categoriaIcon = categoriaSelected[1];
        var categoriaId = categoriaSelected[0];
        if(categoriaId.length>0)
        {
            listarSubcategorias(categoriaId);
            borrarMarkers();
            listarSitiosTuristicosPorCategoria(categoriaId);
        }
        else
        {
             borrarMarkers();
             listarTodosSitiosTuristicos();
             //limpiar select control subcategorias
             document.getElementById("ddlsubcategoria").options.length = 0;
        }     
    });
     $("#ddlsubcategoria").on('change',function(e){      
        var valueSelected = this.value;
        var subcategoriaSelected = valueSelected.split('|');
        var subcategoriaIcon = subcategoriaSelected[1];
        var subcategoriaId = subcategoriaSelected[0];
        if(subcategoriaId.length>0)
        {
          // alert(subcategoriaId+":"+subcategoriaIcon);
          borrarMarkers();
          listarSitiosTuristicosPorSubcategoria(subcategoriaId);
          
          
        }        
    });

     function borrarMarkers()
     {
         for (var i = 0; i < markers.length; i++) 
         {
               map.removeLayer(markers[i]);
        }
     }
     function limpiarArrayMarkers()
     {
        while (markers.length > 0) 
        {
            markers.pop();
        } 
     }

    //funcion con peticion ajax para mostrar las subcategorias, dado una categoria
    function listarSubcategorias(categoriaId)
    {
            var subcategorias="<option value=''>--Elija Subcategoría--</option>";
            $.ajax({
                type: "GET",
                url: 'subcategoriasbycategory/'+categoriaId,
                success: function(data,status,xhr)
                {                       
                    $.each(data, function(array,referencia){
                         var option="";
                         var nombreCategoria="";
                        $.each(referencia,function(clave,valor)
                        {
                            if(clave=='ID')
                            {
                                option+=valor+"|";
                            }
                            else if( clave=='ICONO')
                            {
                                 option+=valor;
                            }
                            else
                            {
                                nombreCategoria=valor;
                            }                           
                           // console.log(clave+" : "+valor);
                        });
                         subcategorias+="<option value='"+option+"'>"+nombreCategoria+"</option>";
                       // console.log('----------------------------------------------');
                    });
                    $("#ddlsubcategoria").html(subcategorias);
                },
                error: function(xhr, status, error)
                {
                    console.info(xhr);
                    console.info(status);
                    console.info(error);
                }
            });
    }

    function mostrarDetalleSitioTuristico(latitud, longitud,idSitio)
    {
      getSitioTuristicoByLatLng(latitud,longitud);
      getCalificacionSitioTuristico(latitud,longitud);
      getServiciosSitioTuristico(latitud,longitud);
      window.location="#detalle";
      $("#idSitio").text(idSitio);
      $("#estadoCalificacion").hide();
    }


    function onClick(e) 
    {     
    getSitioTuristicoByLatLng(e.latlng.lat,e.latlng.lng);
    //console.log(e.latlng.lat+" : "+e.latlng.lng);
    getCalificacionSitioTuristico(e.latlng.lat,e.latlng.lng);
    getServiciosSitioTuristico(e.latlng.lat,e.latlng.lng);
    $("#estadoCalificacion").hide();
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

                             //limpiar controles
                              $("#seccionCalificar img").each(function(){                    
                               var defaultsrc = 'recursos_publico/images/uncheck.png';  
                               var elementoActual = $(this).attr('id');        
                              $('#'+elementoActual).attr("src",defaultsrc);                        
                            });

                              //volver a leer la calificacion del sitio
                              var auxLatitud = $("#dLatitud").text().split(':');
                              var lat = auxLatitud[auxLatitud.length-1];
                              var auxLongitud= $("#dLongitud").text().split(':');
                              var lng = auxLongitud[auxLongitud.length-1];
                              getCalificacionSitioTuristico(lat,lng);

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


function getServiciosSitioTuristico(latitud, longitud)
    {     
         var nombre,descripcion,precio,imagen,alt,htmlmedio,htmlcompleto='';
            $.ajax({
                type: "GET",
                url: 'servicios_sitio/'+latitud+"/"+longitud,
                success: function(data,status,xhr)
                {                       
                    $.each(data, function(array,referencia){                                              
                        

                        $.each(referencia,function(clave,valor)
                        {                            
                            switch(clave)
                            {
                                case 'NOMBRE':
                                nombre = valor;                                
                                break;
                                case 'PRECIO':
                                if(valor==0)
                                precio = 'Gratis';
                               else precio = '$ '+valor;
                                break;
                                case 'DESCRIPCION':
                                descripcion = valor;
                                break;
                                case 'IMAGEN':
                                imagen = valor;
                                break;
                                case 'ALT':
                                alt = valor;
                                break;                                
                            }                                                                        
                          // console.log(clave+" : "+valor);                                               
                        });
                        htmlmedio= '<li class="span4 mix web"> <div class="thumbnail servicios">'+'<img src="'+imagen+'" alt="'+alt+'" >'+'<h3>'+nombre+'</h3>'+'<p>'+precio+'</p></div></li>';
                        htmlcompleto+=htmlmedio;


                                      
                    });
                    if(htmlcompleto.length>0)
                    {
                   // console.log(htmlcompleto);
                    $('#portfolio-grid li').remove();
                   $("#container ul").append(htmlcompleto);
               }
               else
               {
                $('#portfolio-grid li').remove();
               }
                   
                },
                error: function(xhr, status, error)
                {
                    console.info(xhr);
                    console.info(status);
                    console.info(error);
                }
            });
    }
 function getCalificacionSitioTuristico(latitud,longitud)
    {      var maximos = new Array();
          var maximo;
          var acumuladorCalificacion=0;
          var valorxCalificador = 0;
          var valorxCalificadorAcumulador = 0;
          var valorCalificador = 0;
          var valorFiltro=0;
          var promedioCalificacion = 0;
            $.ajax({
                type: "GET",
                url: 'sitio_calificacion/'+latitud+"/"+longitud,
                success: function(data,status,xhr)
                {                       
                    $.each(data, function(array,referencia){                                              
                         var icono,nombre,valor_,calificacion;
                        $.each(referencia,function(clave,valor)
                        {                            
                            switch(clave)
                            {     
                                case 'VALOR':                                                               
                                valorFiltro = parseFloat(valor);
                                break;                          
                                case 'CALIFICACION':                               
                                maximos.push(valor);
                                acumuladorCalificacion=  acumuladorCalificacion + parseFloat(valor);
                                valorCalificador = parseFloat(valor); 
                                break;
                            } 

                        }); 

                        valorxCalificador = valorFiltro*valorCalificador;
                        valorxCalificadorAcumulador = valorxCalificadorAcumulador + valorxCalificador;                       
                         maximo = Math.max.apply(Math, maximos);                       
                    });
                    promedioCalificacion = Math.round(valorxCalificadorAcumulador / acumuladorCalificacion);
                    //console.log("promedio: "+valorxCalificadorAcumulador+"/"+acumuladorCalificacion+"="+promedioCalificacion);
                   
                    if(isNaN(promedioCalificacion))
                    {
                       // console.log("promedio no definido");
                       var calificacionDefault = 0;
                        $("#sSuccess").text(calificacionDefault); 
                        var style="width:"+calificacionDefault+"%;text-align: center;" 
                        $("#sSuccess").attr('style',style);                                        
                        $("#sPrimary").text(calificacionDefault);
                        style="width:"+calificacionDefault+"%;text-align: center;background-color: #5bc0de;" 
                        $("#sPrimary").attr('style',style);                                 
                        $("#sInfo").text(calificacionDefault); 
                        style="width:"+calificacionDefault+"%;text-align: center;" 
                        $("#sInfo").attr('style',style);                                                      
                        $("#sWarning").text(calificacionDefault); 
                        style="width:"+calificacionDefault+"%;text-align: center;" 
                        $("#sWarning").attr('style',style);                                
                        $("#sDanger").text(calificacionDefault); 
                        style="width:"+calificacionDefault+"%;text-align: center;background-color: #d9534f;" 
                        $("#sDanger").attr('style',style);
                        $("#pPromedio").text('');
                        $("#pTotalCalificacion").text("0 en total");
                    }
                    else
                    {
                         $("#pPromedio").text(promedioCalificacion);
                          $("#pTotalCalificacion").text(acumuladorCalificacion+" en total");
                   
                                       

                    //segunda iteracion
                     $.each(data, function(array,referencia){                                              
                         var icono,nombre,valor_,calificacion;
                        $.each(referencia,function(clave,valor)
                        {                            
                            switch(clave)
                            {
                                case 'ICONO':
                                icono = valor;                                
                                break;
                                case 'NOMBRE':
                                nombre = valor;
                                break;
                                case 'VALOR':
                                valor_= valor;                        
                                break;
                                case 'CALIFICACION':
                                calificacion = valor;
                                maximos.push(valor);
                                break;
                            }                                                                        
                          // console.log(clave+" : "+valor);                                               
                        });  
                        //console.log(copia);
                      
                       //console.log(maximo);
                        var aux = parseFloat(valor_);
                         var porcentaje = (parseFloat(calificacion)*100)/parseFloat(maximo);
                         //console.log(porcentaje);
                        switch(aux)
                            {                               
                                case 5:
                                $("#sSuccess").text(calificacion); 
                               var style="width:"+porcentaje+"%;text-align: center;" 
                                $("#sSuccess").attr('style',style);          

                                break;
                                case 4:
                                 $("#sPrimary").text(calificacion);
                                var style="width:"+porcentaje+"%;text-align: center;background-color: #5bc0de;" 
                                $("#sPrimary").attr('style',style); 
                                break;
                                case 3:
                                 $("#sInfo").text(calificacion); 
                                var style="width:"+porcentaje+"%;text-align: center;" 
                                $("#sInfo").attr('style',style);                      
                                break;
                                case 2:
                                 $("#sWarning").text(calificacion); 
                                var style="width:"+porcentaje+"%;text-align: center;" 
                                $("#sWarning").attr('style',style);
                                break;
                                case 1:
                                 $("#sDanger").text(calificacion); 
                                var style="width:"+porcentaje+"%;text-align: center;background-color: #d9534f;" 
                                $("#sDanger").attr('style',style);
                                break;
                            }                           
                     
                    });
                      }
                },
                error: function(xhr, status, error)
                {
                    console.info(xhr);
                    console.info(status);
                    console.info(error);
                }
            });

    }

 function getSitioTuristicoByLatLng(latitud, longitud)
    {      var copia = new Array();
            $.ajax({
                type: "GET",
                url: 'sitio_turistico_by_latlng/'+latitud+"/"+longitud,
                success: function(data,status,xhr)
                {                       
                    $.each(data, function(array,referencia){                                              
                         var nombre,descripcion,direccion,latitud,longitud,telefono,celular,email,fecha,img,alt;                                                 
                        $.each(referencia,function(clave,valor)
                        {                            
                            switch(clave)
                            {
                                case 'NOMBRE':
                                nombre = valor; 
                                $("#pNombreSitio").text(valor+' pone a tu disposición los siguientes servicios.');                               
                                break;
                                case 'DIRECCION':
                                direccion = valor;
                                break;
                                case 'DESCRIPCION':
                                descripcion = valor;
                                break;
                                case 'TELEFONO':
                                telefono = valor;
                                break;
                                case 'CELULAR':
                                celular = valor;
                                break;
                                case 'EMAIL':
                                email = valor;
                                break;
                                case 'ULTIMA_EDICION':
                                fecha = valor;
                                break;
                                case 'LATITUD':
                                latitud = valor;
                                break;
                                case 'LONGITUD':
                                longitud = valor;                        
                                break; 
                                case 'IMG':
                                img = valor;                        
                                break; 
                                case 'ALT':
                                alt = valor;                        
                                break; 
                                case 'ID_SITIO':                                 
                                //console.log("id sitio: "+identificadorSitio);                                                     
                                $("#idSitio").text(valor);
                                break; 

                            }                                                                        
                          // console.log(clave+" : "+valor);                                               
                        });

                           $("#dNombre").text('Detalles de '+nombre);     
                           $("#dDescripcion").text(descripcion);
                           $("#dDireccion").text(direccion);
                           $("#dLatitud").text('Latitud: '+latitud);
                           $("#dLongitud").text('Longitud: '+longitud);
                           $("#dTelefono").text(telefono);             
                           $("#dCelular").text(telefono);
                           $("#dEmail").text(email);
                           $("#dFecha").text(fecha);

                           if(img!=null)
                           {
                            $("#dImagenSitio").attr('src',img);
                            $("#dImagenSitio").attr('alt',alt);
                           }
                           else
                           {
                            $("#dImagenSitio").attr('src',"");
                            $("#dImagenSitio").attr('alt',"");
                           }                      
                    });
                   
                },
                error: function(xhr, status, error)
                {
                    console.info(xhr);
                    console.info(status);
                    console.info(error);
                }
            });
    }
     function listarTodosSitiosTuristicos()
    {      var copia = new Array();
            $.ajax({
                type: "GET",
                url: 'sitios_turisticos',
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
                                //document.cookie = "sitio="+nombre;
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
                                        
                       marker1 = L.marker([Latitud,Longitud], {icon: L.AwesomeMarkers.icon({icon: icono, prefix: 'fa', markerColor: color}) }).on('click', onClick).addTo(map).bindPopup(nombre+"<br>"
                       +'<a href="#detalle";>Ver detalles..</a>');                      
                       markers.push(marker1);
                    });
                   
                },
                error: function(xhr, status, error)
                {
                    console.info(xhr);
                    console.info(status);
                    console.info(error);
                }
            });
    }

    function listarSitiosTuristicosPorCategoria(categoria)
    {             
        limpiarArrayMarkers();
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
                        });                      
                      marker1 = L.marker([Latitud,Longitud], {icon: L.AwesomeMarkers.icon({icon: icono, prefix: 'fa', markerColor: color}) }).on('click', onClick).addTo(map).bindPopup(nombre+"<br>"+'<a class="jumper" href="#detalle";>Ver detalles..</a>');
                      markers.push(marker1);
                    });                   
                },
                error: function(xhr, status, error)
                {
                    console.info(xhr);
                    console.info(status);
                    console.info(error);
                }
            });
    }

    function listarSitiosTuristicosPorSubcategoria(subcategoria)
    {             
        limpiarArrayMarkers();
            $.ajax({
                type: "GET",
                url: 'sitios_turisticos_by_subcategoria/'+subcategoria,
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
                        });                      
                      marker1 = L.marker([Latitud,Longitud], {icon: L.AwesomeMarkers.icon({icon: icono, prefix: 'fa', markerColor: color}) }).on('click', onClick).addTo(map).bindPopup(nombre+"<br>"+'<a class="jumper" href="#detalle";>Ver detalles..</a>');
                      markers.push(marker1);
                    });                   
                },
                error: function(xhr, status, error)
                {
                    console.info(xhr);
                    console.info(status);
                    console.info(error);
                }
            });
    }