<?php

namespace turismoPastaza\Http\Controllers;

use Illuminate\Http\Request;

use turismoPastaza\Http\Requests;
use turismoPastaza\Modulo;
use Illuminate\Support\Facades\Redirect;
use turismoPastaza\Http\Requests\ModuloFormRequest;
use DB;

class ModuloController extends Controller
{
    public function _construct()
    {

    }
    public function index(Request $request)
	{
		if($request)
		{
			$query=trim($request->get('searchText'));
			$modulos=DB::table('MODULO')->where('NOMBRE','LIKE','%'.$query.'%');
			return view('ModuloAdministracion.modulo',["modulos"=>$modulos,"searchText"=>$query]);
		}
    }
    public function create()
    {
    	return view("ModuloAdministracion.modulo");
    }
    public function store()
    {
    	
    }
    public function show()
    {
    	return view ("ModuloAdministracion.modulo");
    }
    public function edit()
    {
    	
    }
    public function update()
    {
    	
    }
    public function destroy()
    {
    	
    }

}
