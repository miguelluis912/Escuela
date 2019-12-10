<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    //muestra la lista de la base de datos
    public function inicio(){
    	$notas= App\Nota::all();
    	return view('welcome',compact('notas'));
    }
    
    //inserta en la base de datos
    public function crear(Request $request){
    	//return $request ->all();   --retorna los valores a gregar es checar codigo

    		//validaciones de los campos de agregar
    		$request->validate([
			    'nombre' => 'required',
			    'descripcion' => 'required'
			]);
    		//termina validacion




    	$notaNueva = new App\Nota;    //tenemos las propiedades del modelo de la tabla
        $notaNueva->nombre = $request->nombre;    //asignamos las variables de la tabla
        $notaNueva->descripcion = $request->descripcion;

        $notaNueva->save();  //con esto guardamos 

        return back()->with('mensaje', 'Nota agregada');  //mensaje de agregacion

    }

    	//para editar campos de la tabla
    public function editar($id){
    $nota = App\Nota::findOrFail($id);
    return view('notas.editar', compact('nota'));
}

	public function update(Request $request, $id){

	$notaActualizada = App\Nota::find($id);
    $notaActualizada->nombre = $request->nombre;
    $notaActualizada->descripcion = $request->descripcion;
    $notaActualizada->save();
    return back()->with('mensaje', 'Nota editada!');


	}
		//para eliminar campos de la tabla
	public function eliminar($id){

    $notaEliminar = App\Nota::findOrFail($id);
    $notaEliminar->delete();

    return back()->with('mensaje', 'Nota Eliminada');
}
}
