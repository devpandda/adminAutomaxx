<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMontadora;
use App\Models\Montadora;
use Illuminate\Http\Request;

class MontadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $montadoras = Montadora::paginate(10);

        return view('sis.montadoras', compact('montadoras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sis.montadorasCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMontadora $request)
    {
        Montadora::create($request->all());

        return redirect()->route('montadoras.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Montadora  $montadora
     * @return \Illuminate\Http\Response
     */
    public function show(Montadora $montadora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Montadora  $montadora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $montadora = Montadora::find($id);


        

        if(!$montadora){
            return redirect()->route('montadoras.index');
        }

        return view('sis.montadorasEdit', compact('montadora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Montadora  $montadora
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMontadora $request, $id)
    {
        
        if (!$montadora = Montadora::find($id)){

            return redirect()-route('montadoras.index');
        }

        $montadora->update($request->all());
        return redirect()
        ->route('montadoras.index')
        ->with('message', 'Registro editado com sucesso');


       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Montadora  $montadora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {



        if(!$montadora = Montadora::find($id)){
                return redirect()
                ->route('montadoras.index')
                ->with('message', 'Id não encontrado');

        }

      $montadora->delete();

      return redirect()
      ->route('montadoras.index')
      ->with('message', 'Registro excluido com sucesso');



    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $montadoras = Montadora::where('nome', 'LIKE', "%{$request->search}%")
        ->orWhere('descricao', 'LIKE', "%{$request->search}%")
        ->paginate(10);

        return view('sis.montadoras', compact('montadoras','filters'));
    }
}
