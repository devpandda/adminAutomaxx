<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateModelo;
use App\Models\Linha;
use App\Models\Modelo;
use App\Models\Montadora;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        

        $modelos = Modelo::with('montadora','linha')->paginate(10);


        return view('sis.modelos', compact('modelos'));

      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $montadoras = Montadora::get();
        $linhas = Linha::get();

        return view('sis.modelosCreate', compact('montadoras','linhas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateModelo $request)
    {
        
        Modelo::create($request->all());

        return redirect()->route('modelos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Modelo::where('id',$id)->first();

        

        $montadora = $modelo->montadora()->first();

        dd($montadora);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Modelo::with('montadora','linha')->find($id);


        $montadoras = Montadora::get();
        $linhas = Linha::get();

        

        if(!$modelo){
            return redirect()->route('modelos.index');
        }

        return view('sis.modelosEdit', compact('modelo','montadoras','linhas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateModelo $request, $id)
    {



        if(!$modelo = Modelo::find($id)){
            return redirect()
            ->route('modelos.index')
            ->with('message','Registro nao encontrador');
        }

        $modelo->update($request->all());


        return redirect()
        ->route('modelos.index')
        ->with('message', 'Registro editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        if(!$modelo = Modelo::find($id)){

            return redirect()
            ->route('modelos.index')
            ->with('message', 'Modelo não encontrado');

        }
        
       $modelo->delete();

       return redirect()
       ->route('modelos.index')
       ->with('message', 'Registro excluido com sucesso');
    }
    
    
    public function search(Request $request){


        $filters = $request->except('_token');

        $modelos = Modelo::where('nome', 'LIKE', "%{$request->search}%")
            ->orWhere('descricao', 'LIKE', "%{$request->search}%")
            ->orWhere('anoIni', 'LIKE', "%{$request->search}%")
            ->orWhere('anoFim', 'LIKE', "%{$request->search}%")
            ->paginate(10);


        return view('sis.modelos', compact('modelos','filters'));
    }

}