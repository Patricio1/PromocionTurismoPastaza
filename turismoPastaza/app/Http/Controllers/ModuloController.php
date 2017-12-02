<?php

namespace turismoPastaza\Http\Controllers;

use Illuminate\Http\Request;

use turismoPastaza\Http\Requests;
use DB;
use turismoPastaza\Modulo;
use Illuminate\Support\Facades\Redirect;
use turismoPastaza\Http\Requests\ModuloFormRequest;
use Session;
class ModuloController extends Controller
{
    public function index(){    
         $modulos = DB::table('modulo as m')                    
        ->select('m.ID as id','m.NOMBRE as nombre','m.DESCRIPCION as descripcion','m.PATH as path')  
        ->orderBy('m.ID','asc')->paginate(5);
                return view("admin.modulo.index",["modulos"=>$modulos]);      
    }
    
    public function store(ModuloFormRequest $request){      
    $modulo = new Modulo;
    $modulo->NOMBRE=$request->get('NOMBRE');
    $modulo->DESCRIPCION=$request->get('DESCRIPCION');
    $modulo->PATH=$request->get('PATH');
 
    $modulo->save();
    Session::flash('mensaje', 'Módulo creado exitosamente!');
    return Redirect::to('admin/modulo');         
    }
   
    public function update(ModuloFormRequest $request,$id){
    //busco el modulo dado su id
    $modulo= Modulo::findOrFail($id);
    //establecer la propiedad NOMBRE con su respectivo request
    //Nota: ID no hace falta porque es AUTO_INCREMENT
    $modulo->NOMBRE=$request->get('NOMBRE');
    $modulo->DESCRIPCION=$request->get('DESCRIPCION');
    $modulo->PATH=$request->get('PATH');   

    //actualizo el modulo
    $modulo->update();
    //Mensaje para mostrar al usuario
    Session::flash('mensaje', 'Módulo actualizado exitosamente!');
    //Redireccion a la url admin/modulo
    return Redirect::to('admin/modulo');
    }

    public function destroy($id){
        $modulo= DB::table('modulo')->where('ID','=',$id)->delete();  
        Session::flash('mensaje', 'Módulo eliminado exitosamente!');     
        return Redirect::to('admin/modulo');   
    } 

}
