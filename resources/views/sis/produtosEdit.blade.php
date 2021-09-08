@extends('../layout/' . $layout)

@section('subhead')
    <title>Editar o Registro: {{ $produto->nome }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Editando o Registo (Produto): {{ $produto->nome}}</h2>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <form action="{{  route('produtos.update', $produto->id)  }}" method="post">
                @csrf
                @method('put')
                <div class="intro-y box p-5">
                    <div class="p-3">



                        @if ($errors->any())
                        <label for="crud-form-1" class="form-label text-theme-6">Nome do Produto</label>
                        <input id="crud-form-1 nome" name="nome" type="text" class="form-control w-full border-theme-6" placeholder="Nome do Produto" value="{{  $produto->nome  }}">
                        <div class="text-theme-6 mt-2">O Nome não pode ser vazio ou menor que 3 caracteres</div>  
                        @else
                        <label for="crud-form-1" class="form-label">Nome do Produto</label>
                        <input id="crud-form-1 nome" name="nome" type="text" class="form-control w-full" placeholder="Nome do Produto" value="{{  $produto->nome  }}"> 
                        @endif


                        
                    </div>
                    <div class="p-3">
                        <label for="crud-form-1" class="form-label">SKU:</label>
                        <input id="crud-form-1" name="SKU" type="text" class="form-control w-full" placeholder="Nome do veiculo" value="{{ $produto->SKU }}">
                    </div>
    
    
                    <div class="p-3">
                        <label>Descrição do Produto</label>
                        <div class="mt-2">
                            <textarea name="descricao" class="editor" data-simple-toolbar="true" id="descricao">
                                {{  $produto->descricao  }}
                            </textarea>
                        </div>
                    </div>
    
    
    
                    <div id="inline-form" class="p-5">
                        <div class="preview">
                            <div class="grid grid-cols-12 gap-2">
                                <label for="crud-form-1" class="form-label col-span-4">Cod. OEM:</label>
                                <label for="crud-form-1" class="form-label col-span-4">Cod. Barra:</label>
                                <label for="crud-form-1" class="form-label col-span-4">Qtd. Uso:</label>
                                <input type="text" class="form-control col-span-4" placeholder="Cod. OEM" name="codOem" value="{{ $produto->codOem }}">
                                
                                <input type="text" class="form-control col-span-4" placeholder="Cod. Barra" name="codBarra" value="{{ $produto->codBarra }}">
                                
                                <input type="text" class="form-control col-span-4" placeholder="Quantidade de uso" name="qtdUso" value="{{ $produto->qtdUso }}">
                            </div>
                        </div>
                        
                    </div>
    
                    <div id="inline-form" class="p-5">
                        <div class="preview">
                            <div class="grid grid-cols-12 gap-2">
                                <label for="crud-form-1" class="form-label col-span-4">Voltagem:</label>
                                <label for="crud-form-1" class="form-label col-span-4">NCM:</label>
                                <label for="crud-form-1" class="form-label col-span-4">Referência:</label>
                                <input type="text" class="form-control col-span-4" placeholder="Voltagem" name="voltagem" value="{{ $produto->voltagem }}">
                                
                                <input type="text" class="form-control col-span-4" placeholder="NCM" name="ncm" value="{{ $produto->ncm }}">
                                
                                <input type="text" class="form-control col-span-4" placeholder="Referencia" name="ref" value="{{ $produto->ref }}">
                            </div>
                        </div>
                        
                    </div>
    
                    <div class="p-3">
                        <label for="crud-form-2" class="form-label">Categoria</label>
                        <div class="mt-2">
                            <select name="idCategoria" data-placeholder="Seleciona a Categoria" class="tom-select w-full">
    
                                <option value="{{$produto->categoria->id}}">{{  $produto->categoria->nome }}</option>
                                @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{  $categoria->nome }}</option>
                                @endforeach
    
    
                            </select>
                        </div>
    
                    </div>
    
                    <input type="hidden" name="img" value="default">
    
    
                    <div class="text-right mt-5">
                        <a href="{{ route('produtos.index') }}"><button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancelar</button></a>
                        <button type="submit" class="btn btn-primary w-24">Salvar</button>
                    </div>
    
    
                </div>
                </form>
        </div>
    </div>








    
@endsection
