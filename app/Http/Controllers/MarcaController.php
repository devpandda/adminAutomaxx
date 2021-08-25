<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMarca;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $marcas = Marca::paginate(10);
        return view('sis.marcas', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sis.marcasCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMarca $request)
    {


        Marca::create($request->all());

        return redirect()->route('marcas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $marca = Marca::find($id);

        if(!$marca){
            return redirect()
            ->route('marcas.index');
        }
        
        return view('sis.marcasEdit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMarca $request, $id)
    {
        if(!$marca = Marca::find($id)){
            return redirect()
            ->route('marcas.index');
        }

       $marca->update($request->all());

       return redirect()
       ->route('marcas.index')
       ->with('message', 'Registro editado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        if(!$marca = Marca::find($id)){

            return redirect()
            ->route('marcas.index')
            ->with('message', 'Id não encontrado');
        }

        $marca->delete();
        

        return redirect()
        ->route('marcas.index')
        ->with('message', 'Registro excluido com sucesso');


    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $marcas = Marca::where('nome', 'LIKE', "%{$request->search}%")
        ->orWhere('descricao', 'LIKE',"%{$request->search}%" )
        ->paginate(10);

        return view('sis.marcas', compact('marcas', 'filters'));

       
    }
}
