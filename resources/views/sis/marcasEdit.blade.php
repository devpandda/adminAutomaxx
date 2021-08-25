@extends('../layout/' . $layout)

@section('subhead')
    <title>Editar o Registro: {{ $marca->nome }}</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Editando o Registo (Fabricante/Equivalente): {{ $marca->nome}}</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('marcas.update', $marca->id) }}" method="post">
                @csrf
                @method('put')
            <div class="intro-y box p-5">
                <div>
                   
                    @if ($errors->any())
                    <label for="crud-form-1" class="form-label text-theme-6">Nome do Fabricante</label>
                    <input id="crud-form-1 nome" name="nome" type="text" class="form-control w-full border-theme-6" placeholder="Nome do fabricante" value="{{  $marca->nome  }}">
                    <div class="text-theme-6 mt-2">O Nome não pode ser vazio ou menor que 3 caracteres</div>  
                    @else
                    <label for="crud-form-1" class="form-label">Nome do fabricante</label>
                    <input id="crud-form-1 nome" name="nome" type="text" class="form-control w-full" placeholder="Nome do fabricante" value="{{  $marca->nome  }}"> 
                    @endif
                   
                    
                </div>
               
                
                
           
                <div class="mt-3">
                    <label>Descrição</label>
                    <div class="mt-2">
                        <textarea name="descricao" class="editor" data-simple-toolbar="true" id="descricao">
                            {{  $marca->descricao  }}
                        </textarea>
                    </div>
                </div>
               




                <div class="text-right mt-5">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancelar</button>
                    <button type="submit" class="btn btn-primary w-24">Editar</button>
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
