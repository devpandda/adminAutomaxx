@extends('../layout/' . $layout)

@section('subhead')
<title>Produtos - Adicionar Novo</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Adicionar novo Produto</h2>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <form action="{{ route('produtos.store') }}" method="post">
            @csrf
            <div class="intro-y box p-5">
                <div class="p-3">
                    <label for="crud-form-1" class="form-label">Nome do Produto:</label>
                    <input id="crud-form-1" name="nome" type="text" class="form-control w-full" placeholder="Nome do veiculo">
                </div>
                <div class="p-3">
                    <label for="crud-form-1" class="form-label">SKU:</label>
                    <input id="crud-form-1" name="SKU" type="text" class="form-control w-full" placeholder="Nome do veiculo">
                </div>


                <div class="p-3">
                    <label>Descrição do Produto</label>
                    <div class="mt-2">
                        <textarea name="descricao" class="editor" data-simple-toolbar="true" id="descricao">
                            {{  old('descricao');  }}
                        </textarea>
                    </div>
                </div>



                <div id="inline-form" class="p-5">
                    <div class="preview">
                        <div class="grid grid-cols-12 gap-2">
                            <label for="crud-form-1" class="form-label col-span-4">Cod. OEM:</label>
                            <label for="crud-form-1" class="form-label col-span-4">Cod. Barra:</label>
                            <label for="crud-form-1" class="form-label col-span-4">Qtd. Uso:</label>
                            <input type="text" class="form-control col-span-4" placeholder="Cod. OEM" name="codOem">
                            
                            <input type="text" class="form-control col-span-4" placeholder="Cod. Barra" name="codBarra">
                            
                            <input type="text" class="form-control col-span-4" placeholder="Quantidade de uso" name="qtdUso">
                        </div>
                    </div>
                    
                </div>

                <div id="inline-form" class="p-5">
                    <div class="preview">
                        <div class="grid grid-cols-12 gap-2">
                            <label for="crud-form-1" class="form-label col-span-4">Voltagem:</label>
                            <label for="crud-form-1" class="form-label col-span-4">NCM:</label>
                            <label for="crud-form-1" class="form-label col-span-4">Referência:</label>
                            <input type="text" class="form-control col-span-4" placeholder="Voltagem" name="voltagem">
                            
                            <input type="text" class="form-control col-span-4" placeholder="NCM" name="ncm">
                            
                            <input type="text" class="form-control col-span-4" placeholder="Referencia" name="ref">
                        </div>
                    </div>
                    
                </div>

                <div class="p-3">
                    <label for="crud-form-2" class="form-label">Categoria</label>
                    <div class="mt-2">
                        <select name="idCategoria" data-placeholder="Seleciona a Categoria" class="tom-select w-full">

                            @foreach ($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{  $categoria->nome }}</option>
                            @endforeach


                        </select>
                    </div>

                </div>

                <input type="hidden" name="img" value="default">


                <div class="text-right mt-5">
                    <a href="{{ route('produtos.index') }}"><button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button></a>
                    <button type="submit" class="btn btn-primary w-24">Salvar</button>
                </div>


            </div>
            </form>
    </div>
</div>







@endsection