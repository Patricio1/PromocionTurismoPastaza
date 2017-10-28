<?php

namespace turismoPastaza\Http\Controllers;

use Illuminate\Http\Request;


use turismoPastaza\Http\Requests;
use DB;

class CategoriaController extends Controller
{
   public function index()
   {
   		$categorias = DB::table('categoria')->select('ID','NOMBRE','ICONO')->orderBy('ID','asc')->get();
   		return response()->json($categorias,200);
   }
 
}
