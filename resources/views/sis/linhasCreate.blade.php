@extends('../layout/' . $layout)

@section('subhead')
    <title>Linhas - Adicionar Registro</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Adicionar Nova Linha</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form action="{{  route('linhas.store')  }}" method="post">
                @csrf
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Nome da Linha</label>
                    <input id="crud-form-1" name="nome" type="text" class="form-control w-full" placeholder="Nome da Linha">
                </div>
               
                
                
               
                <div class="mt-3">
                    <label>Descrição</label>
                    <div class="mt-2">
                        <div data-simple-toolbar="true" class="editor" name="descricao">
                            <textarea name="descricao"> of the editor.</textarea>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancelar</button>
                    <button type="submit" class="btn btn-primary w-24">Salvar</button>
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection
