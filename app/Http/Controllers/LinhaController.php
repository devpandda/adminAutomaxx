<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
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
    public function edit(Linha $linha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Linha  $linha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Linha $linha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Linha  $linha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Linha $linha)
    {
        //
    }
}
