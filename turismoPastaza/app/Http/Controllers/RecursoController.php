<?php

namespace turismoPastaza\Http\Controllers;

use Illuminate\Http\Request;

use turismoPastaza\Http\Requests;
use DB;
use turismoPastaza\Recurso;
use Illuminate\Support\Facades\Redirect;
use turismoPastaza\Http\Requests\RecursoFormRequest;
use Session;
use Illuminate\Support\Facades\Input;

class RecursoController extends Controller
{
    public function index()
    {    	
    		$recursos =DB::table('recurso as r')
    		->select('r.ID as id','r.ID_SITIO as idsitio','r.ID_SERVICIO as idservicio','r.PATH as path','r.DESCRIPCION as descripcion')
    		->orderBy('r.ID','desc')->paginate(7);

    		$sitios = DB::table('sitio_turistico as s')
    		->select('s.ID_SITIO as id','s.NOMBRE as nombre')
    		->orderBy('s.ID_SITIO','desc')->get();

    		$servicios = DB::table('servicios as s')
    		->select('s.ID_SERVICIO as id','s.NOMBRE as nombre')
    		->orderBy('s.ID_SERVICIO','desc')->get();


    		return view('admin.recurso.index',["recursos"=>$recursos,"sitios"=>$sitios,"servicios"=>$servicios]);    	
    }
    public function store(RecursoFormRequest $request){      
    $recurso = new Recurso;
    $recurso->ID_SITIO=$request->get('ID_SITIO');
    $recurso->ID_SERVICIO=$request->get('ID_SERVICIO');  
    if(Input::hasFile('PATH'))
    	{
    		$file = Input::file('PATH');
    		$file->move(public_path().'/recursos_publico/images/',$file->getClientOriginalName());
    		$recurso->PATH=$file->getClientOriginalName();    		
    	}  
    $recurso->DESCRIPCION=$request->get('DESCRIPCION');
 
    $recurso->save();
    Session::flash('mensaje', 'Recurso creado exitosamente!');
    return Redirect::to('admin/recurso');         
    }
}
