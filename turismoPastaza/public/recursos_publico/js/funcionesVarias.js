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










$("#pNombreSitio").text($("#dNombre").text()+' pone a tu disposición los siguientes servicios.');
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
    try{
        L.control.layers({
        'OpenStreetMap.HOT': withBoundary('OpenStreetMap.HOT').addTo(map),
        'Stamen.Watercolor': withBoundary('Stamen.Watercolor'),
        'Esri.WorldStreetMap': withBoundary('Esri.WorldStreetMap'),
        'MapQuestOpen.Aerial': withBoundary('MapQuestOpen.Aerial')
    }, null, {collapsed: false}).addTo(map);
   
    }catch(err) {
}  