<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProduto;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::with('categoria')->paginate(10);

        return view('sis.produtos', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::get();

        return view('sis.produtosCreate', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProduto $request)
    {
        

        
        Produto::create($request->all());

      

        return redirect()
        ->route('produtos.index')
        ->with('message', 'Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $produto = Produto::with('categoria')->find($id);
        
        $categorias = Categoria::get();

        

        if(!$produto){
            return redirect()
            ->route('produtos.index')
            ->with('message','Nao encontrado');
        }

        return view('sis.produtosEdit', compact('produto','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProduto $request, $id)
    {
        

        if(!$produto = Produto::find($id)){

            return redirect()
            ->route('produtos.index')
            ->with('message', 'nao erncontrado');

        }


        $produto->update($request->all());

       


        return redirect()
        ->route('produtos.index')
        ->with('message', 'Registro editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        if(!$produto = Produto::find($id)){

            return redirect()
            ->route('produtos.index')
            ->with('message', 'produto nao encontrado');

        }


        $produto->delete();
        
    

       return redirect()
       ->route('produtos.index')
       ->with('message', 'Registro excluido com sucesso');
    }

    public function search(Request $request){


        $filters = $request->except('_token');

        $produtos = Produto::where('nome', 'LIKE', "%{$request->search}%")
            ->orWhere('descricao', 'LIKE', "%{$request->search}%")
            ->orWhere('codOem', 'LIKE', "%{$request->search}%")
            ->orWhere('codBarra', 'LIKE', "%{$request->search}%")
            ->orWhere('SKU', 'LIKE', "%{$request->search}%")
            ->orWhere('qtdUso', 'LIKE', "%{$request->search}%")
            ->orWhere('ref', 'LIKE', "%{$request->search}%")
            ->orWhere('ncm', 'LIKE', "%{$request->search}%")
            ->orWhere('voltagem', 'LIKE', "%{$request->search}%")
            ->paginate(10);


        return view('sis.produtos', compact('produtos','filters'));
    }
}
