<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAtributos;
use App\Models\Atributos;
use Illuminate\Http\Request;

class AtributosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atributos = Atributos::paginate(10);
        return view('sis.atributos', compact('atributos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('sis.atributosCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateAtributos $request)
    {
        
        Atributos::create($request->all());
        return redirect()->route('atributos.index')->with('message','Registro incluido com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atributos  $atributos
     * @return \Illuminate\Http\Response
     */
    public function show(Atributos $atributos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atributos  $atributos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atributo = Atributos::find($id);

        if(!$atributo){
            return redirect()
            ->route('atributos.index');
        }

        return view('sis.atributosEdit', compact('atributo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atributos  $atributos
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateAtributos $request, $id)
    {
        
        if(!$atributo = Atributos::find($id)){
            return redirect()
            ->route('atributos.index');
        }

        $atributo->update($request->all());

        return redirect()
        ->route('atributos.index')
        ->with('message', 'Registro editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atributos  $atributos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$atributo = Atributos::find($id)){

            return redirect()
            ->route('atributos.index')
            ->with('message', 'Id não encontrado');
        }

        $atributo->delete();

        return redirect()
        ->route('atributos.index')
        ->with('message', 'Registro excluido com sucesso');

    }

    public function search(Request $request){
        $filters = $request->except('_token');

        $atributos = Atributos::where('nome', 'LIKE', "%{$request->search}%")
        ->orWhere('descricao', 'LIKE', "%{$request->search}%")
        ->paginate(10);

        return view('sis.atributos', compact('atributos', 'filters'));
    }
}
