<?php

namespace turismoPastaza\Http\Controllers;

use Illuminate\Http\Request;

use turismoPastaza\Http\Requests;
use turismoPastaza\Perfil;
use Illuminate\Support\Facades\Redirect;
use turismoPastaza\Http\Requests\PerfilFormRequest;
use DB;
use Session;

class PerfilController extends Controller
{
   
    public function index(){    
         $perfiles = DB::table('perfil as p')                    
        ->select('p.ID as id','p.NOMBRE as nombre')  
        ->orderBy('p.ID','asc')->paginate(5);
                return view("admin.perfil.index",["perfiles"=>$perfiles]);      
    }
    
    public function store(PerfilFormRequest $request){     
    //PerfilForm 
    /**$perfil = new Perfil;
    $perfil->NOMBRE=$request->get('NOMBRE');
 
    $perfil->save();
    Session::flash('mensaje', 'Perfil creado exitosamente!');
    return Redirect::to('admin/perfil');  */

    if($request->ajax())
    {
        //Perfil::create($request->all());
        $perfil = new Perfil;
    $perfil->NOMBRE=$request->get('NOMBRE');
 
    $perfil->save();
        return response()->json([
                "mensaje"=>"creado"
            ]);
    }  

    }
   
    public function update(PerfilFormRequest $request,$id){
    //busco el perfil dado su id
    $perfil= Perfil::findOrFail($id);
    //establecer la propiedad NOMBRE con su respectivo request
    //Nota: ID no hace falta porque es AUTO_INCREMENT
    $perfil->NOMBRE=$request->get('NOMBRE');        

    //actualizo el perfil
    $perfil->update();
    //Mensaje para mostrar al usuario
    Session::flash('mensaje', 'Perfil actualizado exitosamente!');
    //Redireccion a la url admin/perfil
    return Redirect::to('admin/perfil');
    }

    public function destroy($id){
        $perfil= DB::table('perfil')->where('ID','=',$id)->delete();  
        Session::flash('mensaje', 'Perfil eliminado exitosamente!');     
        return Redirect::to('admin/perfil');   
    } 


}
