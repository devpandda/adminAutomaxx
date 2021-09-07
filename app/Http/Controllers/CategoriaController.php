<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCategoria;
use App\Models\Atributos;
use App\Models\Categoria;
use App\Models\Modelo;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(10);

        return view('sis.categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sis.categoriasCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoria $request)
    {

        Categoria::create($request->all());
        
        return redirect()->route('categorias.index')->with('message','Registro incluido com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);

        if(!$categoria){
            return redirect()
            ->route('categorias.index')
            ->with('message', 'erro');
        }

        $allatributos = Atributos::get();

        $atributos = $categoria->atributos()->get();
 
       
        return view('sis.categoriasShow', compact('categoria', 'allatributos', 'atributos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $categoria = Categoria::find($id);
        
       if(!$categoria){
           return redirect()
           ->route('categorias.index');
       }

      

        return view('sis.categoriasEdit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoria $request, $id)
    {
        
        if(!$categoria = Categoria::find($id)){
            return redirect()
            ->route('categorias.index');
        }

        $categoria->update($request->all());

        return redirect()
        ->route('categorias.index')
        ->with('message', 'Registro editado com sucesso');
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function updateatributo(Request $request, $id)
    {
        
        if(!$categoria = Categoria::find($id)){
            return redirect()
            ->route('categorias.index');
        }

        $categoria->atributos()->attach($request->idAtributo);

        

        
        $allatributos = Atributos::get();

        $atributos = $categoria->atributos()->get();
 
       
        return view('sis.categoriasShow', compact('categoria', 'allatributos', 'atributos'));






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$categoria = Categoria::find($id)){

            return redirect()
            ->route('categorias.index')
            ->with('message', 'Id não encontrado');
        }

        $categoria->delete();

        return redirect()
        ->route('categorias.index')
        ->with('message', 'Registro excluido com sucesso');

    }



    public function destroyatributo($id, $idatributo)
    {

        
        if(!$categoria = Categoria::find($id)){

            return redirect()
            ->route('categorias.index')
            ->with('message', 'Id não encontrado');
        }

        $categoria->atributos()->detach($idatributo);

        

        
        $allatributos = Atributos::get();

        $atributos = $categoria->atributos()->get();
 
       
        return view('sis.categoriasShow', compact('categoria', 'allatributos', 'atributos'));

    }

    public function search(Request $request){
        $filters = $request->except('_token');

        $categorias = Categoria::where('nome', 'LIKE', "%{$request->search}%")
        ->orWhere('descricao', 'LIKE', "%{$request->search}%")
        ->paginate(10);

        return view('sis.categorias', compact('categorias', 'filters'));
    }
}
