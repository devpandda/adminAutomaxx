<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateLinha;
use App\Models\Linha;
use Illuminate\Http\Request;

class LinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $linhas = Linha::get();
        
        return view('sis/linhas', compact('linhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sis/linhasCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLinha $request)
    {
       

        Linha::create($request->all());

        return redirect()->route('linhas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Linha  $linha
     * @return \Illuminate\Http\Response
     */
    public function show(Linha $linha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Linha  $linha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $linha = Linha::find($id);

        if(!$linha){
            return redirect()->route('linhas.index');
        }

        return view('sis/linhasEdit', compact('linha'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Linha  $linha
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateLinha $request, $id)
    {
        ;

        if(!$linha = Linha::find($id)){
            return redirect()->route('linhas.index');
        }

        $linha->update($request->all());

       return redirect()->route('linhas.index')->with('message', 'editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Linha  $linha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
        if(!$linha = Linha::find($id)){

            return redirect()
            ->route('linhas.index')
            ->with('message', 'id nao encontrado');

        }



        $linha->delete();
        return redirect()
        ->route('linhas.index')
        ->with('message', 'Registro excluido com sucesso');
       
    }
}
