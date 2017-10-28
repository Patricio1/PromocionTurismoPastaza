<?php

namespace turismoPastaza\Http\Controllers;

use Illuminate\Http\Request;

use turismoPastaza\Http\Requests;
use DB;

class SubcategoriaController extends Controller
{
    public function index()
   {
   		$subcategorias = DB::table('subcategoria')->select('ID','NOMBRE','ICONO')->orderBy('ID','asc')->get();
   		return response()->json($subcategorias,200);
   }

   /**
   funcion para mostrar todas las subcategorias dada un identificador de categoria
   */
    public function getByIdCategorias($idcategoria)
   {
   		 $subcategorias = DB::table('sitio_turistico as s')
         ->select('s.SUB_CAT AS ID',
              DB::raw("(SELECT NOMBRE FROM subcategoria where ID = s.SUB_CAT) AS NOMBRE"),
              DB::raw("(SELECT ICONO FROM subcategoria where ID = s.SUB_CAT) AS ICONO"))
         ->where('s.SUB_CAT','<>',null)
         ->where('s.CAT_ID','=',$idcategoria)
         ->distinct()
         ->get(['s.SUB_CAT']); 
   		return response()->json($subcategorias,200);
   }

  

}
