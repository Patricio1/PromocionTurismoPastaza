<?php

namespace turismoPastaza\Http\Controllers;

use Illuminate\Http\Request;

use turismoPastaza\Http\Requests;
use turismoPastaza\Calificacion;
use DB;
class SitioTuristicoController extends Controller
{
   public function index()
   {
   		$sitiosTuristicos = DB::table('sitio_turistico as s')
   		->join('categoria as c','s.CAT_ID','=','c.ID')            		
   		->select('s.NOMBRE','s.DIRECCION','s.DESCRIPCION','s.TELEFONO','s.CELULAR','s.EMAIL','s.ULTIMA_EDICION','s.LATITUD','s.LONGITUD','c.ICONO')
   		->where('s.CAT_ID','<>',null)
   		->where('s.ESTADO','=',1)
   		->orderBy('s.ID_SITIO','asc')->get();
   		return response()->json($sitiosTuristicos,200);
   }
   public function getSitiosByCategoria($categoria)
   {
         $sitiosTuristicos = DB::table('sitio_turistico as s')
         ->join('categoria as c','s.CAT_ID','=','c.ID')                 
         ->select('s.NOMBRE','s.DIRECCION','s.DESCRIPCION','s.TELEFONO','s.CELULAR','s.EMAIL','s.ULTIMA_EDICION','s.LATITUD','s.LONGITUD','c.ICONO')
         ->where('s.CAT_ID','<>',null)
         ->where('s.ESTADO','=',1)
         ->where('s.CAT_ID','=',$categoria)
         ->orderBy('s.ID_SITIO','asc')->get();
         return response()->json($sitiosTuristicos,200);
   }
   public function getFiltrosCalificacion()
   {      
         return response()->json($this->getFiltrosCalificacionGenerico(),200);         
   }
    public function getFiltrosCalificacionGenerico()
   {
        $filtrosCalificacion = DB::table('filtro')                     
         ->select('ID','VALOR','NOMBRE','ICONO')      
         ->orderBy('ID','asc')->get();
         return $filtrosCalificacion;         
   }
   public function getSitiosBySubcategoria($subcategoria)
   {
         $sitiosTuristicos = DB::table('sitio_turistico as s')
         ->join('subcategoria as c','s.SUB_CAT','=','c.ID')                 
         ->select('s.NOMBRE','s.DIRECCION','s.DESCRIPCION','s.TELEFONO','s.CELULAR','s.EMAIL','s.ULTIMA_EDICION','s.LATITUD','s.LONGITUD','c.ICONO')
         ->where('s.SUB_CAT','<>',null)
         ->where('s.ESTADO','=',1)
         ->where('s.SUB_CAT','=',$subcategoria)
         ->orderBy('s.ID_SITIO','asc')->get();
         return response()->json($sitiosTuristicos,200);
   }
    public function getCategoriasMasCalificadas()
   {        
         return response()->json($this->getCategoriasMasCalificadasGenerico(),200);    
   }
    public function getCategoriasMasCalificadasGenerico()
   {
         $sitiosTuristicos = DB::table('calificacion as c')
         ->join('sitio_turistico as s','c.ID_SITIO','=','s.ID_SITIO')                 
         ->join('categoria as ct','s.CAT_ID','=','ct.ID') 
         ->select('ct.NOMBRE as CATEGORIA',
          DB::raw("(count( c.ID_SITIO)) as CALIFICACION"))
         ->where('s.ESTADO','=',1)
         ->groupBy('ct.NOMBRE')         
         ->orderBy('CALIFICACION','desc')
         ->limit(3)
         ->get();
         return $sitiosTuristicos;    
   }
    public function getSitiosMasCalificados()
   {          
         return response()->json($this->getSitiosMasCalificadosGenerico(),200);
   }
     public function getSitiosMasCalificadosGenerico()
   {
         $sitiosTuristicos = DB::table('calificacion as c')
         ->join('sitio_turistico as s','c.ID_SITIO','=','s.ID_SITIO')        
         ->select('s.NOMBRE as SITIO',
          DB::raw("(count( c.ID_SITIO)) as CALIFICACION"))
         ->where('s.ESTADO','=',1)
         ->groupBy('s.NOMBRE')         
         ->orderBy('CALIFICACION','desc')
         ->limit(3)
         ->get();
         return $sitiosTuristicos;        
   }
   public function getCalificacionSitio($latitud,$longitud)
   {               
         return response()->json($this->getCalificacionSitioGenerico($latitud,$longitud),200);
   }
   public function getCalificacionSitioGenerico($latitud,$longitud)
   {
         //lamada a procedimiento almacenado GetCalificacion(param)
         $calificacion = DB::select("CALL GetCalificacion($latitud,$longitud)");        
         return $calificacion;
   }
   public function getServiciosSitio($latitud,$longitud)
   {                
         return response()->json($this->getServiciosSitioGenerico($latitud,$longitud),200);   
   }
   public function getServiciosSitioGenerico($latitud,$longitud)
   {        
         $serviciossitio = DB::table('servicios as s')
         ->join('recurso as r','r.ID_SERVICIO','=','s.ID_SERVICIO') 
         ->join('sitio_turistico as st','r.ID_SITIO','=','st.ID_SITIO')               
         ->select('s.NOMBRE','s.PRECIO','s.DESCRIPCION','r.PATH as IMAGEN','r.DESCRIPCION as ALT')         
         ->where('st.LATITUD','=',$latitud)
         ->where('st.LONGITUD','=',$longitud)
         ->get();
         return $serviciossitio;        
   }
   public function getSitiosByLatLng($latitud, $longitud)
   {
         $sitiosTuristicos = DB::table('sitio_turistico as s')
         ->join('categoria as c','s.CAT_ID','=','c.ID')                 
         ->select('s.ID_SITIO','s.NOMBRE','s.DIRECCION','s.DESCRIPCION','s.TELEFONO','s.CELULAR','s.EMAIL',DB::raw('DATE_FORMAT(s.ULTIMA_EDICION, "%d-%b-%Y") as ULTIMA_EDICION'),'s.LATITUD','s.LONGITUD',
            DB::raw("(SELECT PATH FROM recurso where recurso.ID_SITIO = s.ID_SITIO and recurso.ID_SERVICIO is null) AS IMG"),
            DB::raw("(SELECT DESCRIPCION FROM recurso where recurso.ID_SITIO = s.ID_SITIO and recurso.ID_SERVICIO is null) AS ALT"))
         ->where('s.CAT_ID','<>',null)
         ->where('s.ESTADO','=',1)
         ->where('s.LATITUD','=',$latitud)
         ->where('s.LONGITUD','=',$longitud)
         ->orderBy('s.ID_SITIO','asc')->get();
         return response()->json($sitiosTuristicos,200);         
   }
   /**
   funcion para recuperar 3 registros de sitios turisticos recientes ya sea registrados o editados
   estos datos se muestran en la seccion de slider
   */
   public function getSitiosRecientes()
   {
          $sitiosTuristicosRecientes = DB::table('sitio_turistico as s')            
         ->select('s.ID_SITIO','s.NOMBRE','s.DIRECCION','s.DESCRIPCION','s.LATITUD','s.LONGITUD',
            DB::raw("(SELECT PATH FROM recurso where recurso.ID_SITIO = s.ID_SITIO and recurso.ID_SERVICIO is null ) AS IMG"),
            DB::raw("(SELECT DESCRIPCION FROM recurso where recurso.ID_SITIO = s.ID_SITIO and recurso.ID_SERVICIO is null) AS ALT"))
             ->join('categoria as c','s.CAT_ID','=','c.ID')  
         ->where('s.CAT_ID','<>',null)
         ->where('s.ESTADO','=',1) 
         ->inRandomOrder()  
         ->limit(3)
         ->get();

         //->orderBy('s.ULTIMA_EDICION','desc')

         $categorias = $this->getCategorias();           

          //obtener sitio turistico randomico
          $sitioRandom = DB::table('sitio_turistico as s')
         ->join('categoria as c','s.CAT_ID','=','c.ID')                 
         ->select('s.ID_SITIO','s.NOMBRE','s.DIRECCION','s.DESCRIPCION','s.TELEFONO','s.CELULAR','s.EMAIL',DB::raw('DATE_FORMAT(s.ULTIMA_EDICION, "%d-%b-%Y") as ULTIMA_EDICION'),'s.LATITUD','s.LONGITUD',
            DB::raw("(SELECT PATH FROM recurso where recurso.ID_SITIO = s.ID_SITIO and recurso.ID_SERVICIO is null) AS IMG"),
            DB::raw("(SELECT DESCRIPCION FROM recurso where recurso.ID_SITIO = s.ID_SITIO and recurso.ID_SERVICIO is null) AS ALT"))
         ->where('s.CAT_ID','<>',null)
         ->where('s.ESTADO','=',1)        
         ->inRandomOrder()
         ->limit(1)
         ->get();

         $latitud = null;
         $longitud = null;
         foreach ($sitioRandom as $sitio_random) 
         {
          $latitud = $sitio_random->LATITUD;
          $longitud = $sitio_random->LONGITUD;
         }

         $serviciossitio = $this->getServiciosSitioGenerico($latitud,$longitud);


         
         $calificacion = $this->getCalificacionSitioGenerico($latitud,$longitud); 
         $numbers = array();
         $totalCalificacion = 0;
         $valorxCalificacion = 0;
         $valorxCalificacionAcumulador=0;
         $max =0;
         $numeroFiltros = 0;
         $promedioCalificacion=0;
         foreach($calificacion as $obj)
         {
                $numbers[] = $obj->CALIFICACION;
                $totalCalificacion+=$obj->CALIFICACION;
                $valorxCalificacion = floatval($obj->VALOR)*$obj->CALIFICACION;
                $valorxCalificacionAcumulador+=$valorxCalificacion;
         }
         if(count($numbers)>0)
         {
         $max = max($numbers);
         $numeroFiltros = count($calificacion);
         $promedioCalificacion = round($valorxCalificacionAcumulador / $totalCalificacion);
         }
         else $promedioCalificacion = 0;

         
          $filtrosCalificacion = $this->getFiltrosCalificacionGenerico();
         

          $categoriasDestacadas = $this->getCategoriasMasCalificadasGenerico();

       
         $sitiosMasCalificados = $this->getSitiosMasCalificadosGenerico();

        //return response()->json($sitiosTuristicosRecientes,200);     
        return view("index",["sitiosTuristicosRecientes"=>$sitiosTuristicosRecientes,"categorias"=>$categorias,"sitioRandom"=>$sitioRandom,'calificacion'=>$calificacion,'calificacionMaxima'=>$max,'promedioCalificacion'=>$promedioCalificacion,'totalCalificacion'=>$totalCalificacion,'serviciossitio'=>$serviciossitio,'filtrosCalificacion'=>$filtrosCalificacion,'categoriasDestacadas'=>$categoriasDestacadas,'sitiosMasCalificados'=>$sitiosMasCalificados]); 
        //return view("index",["sitiosTuristicosRecientes"=>$sitiosTuristicosRecientes,"categorias"=>$categorias,"sitioRandom"=>$sitioRandom,'calificacion'=>$calificacion,'calificacionMaxima'=>$max,'promedioCalificacion'=>$promedioCalificacion,'totalCalificacion'=>$totalCalificacion]);        
   }
   public function getCategorias()
   {
         $categorias = DB::table('categoria')->select('ID','NOMBRE','ICONO')->orderBy('ID','asc')->get();
         return $categorias;         
         //return view("index",["sitiosTuristicosRecientes"=>$sitiosTuristicosRecientes]);        
   }

   public function login()
   {                
         return view("login");        
   }

   public function guardarCalificacion($idsitio,$idfiltro)
   {                        
      try 
      {
            $calificacion = new Calificacion;
            $calificacion->ID_SITIO=$idsitio;
            $calificacion->ID_FILTRO=$idfiltro;     
            $calificacion->save();              
            return response()->json('OK',200);           
      }
      catch (\Exception $e) 
      {
          //App::abort(500,'Error');
         return response()->json('FAIL',500);  
      } 

   }


}
