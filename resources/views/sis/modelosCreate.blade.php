@extends('../layout/' . $layout)

@section('subhead')
<title>Modelos - Adicionar Novo</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Adicionar novo Modelo de Veiculo</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-8">
        <!-- BEGIN: Form Layout -->

        <form action="{{ route('modelos.store') }}"  method="post">
            @csrf
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Nome do Veículo</label>
                    <input id="crud-form-1" name="nome" type="text" class="form-control w-full" placeholder="Nome do veiculo">
                </div>


                <div class="mt-3">
                    <label>Descrição</label>
                    <div class="mt-2">
                        <textarea name="descricao" class="editor" data-simple-toolbar="true" id="descricao">
                            {{  old('descricao');  }}
                        </textarea>
                    </div>
                </div>

                <div class="mt-3">
                    <label class="form-label">Anos de Fabricação</label>
                    <div class="sm:grid grid-cols-2 gap-2">

                        <div class="input-group">
                            <div id="input-group-3" class="input-group-text">Inicio</div>
                            <input type="number" name="anoIni" class="form-control" placeholder="Inicio" aria-describedby="input-group-3">
                        </div>

                        <div class="input-group mt-2 sm:mt-0">
                            <div id="input-group-4" class="input-group-text">Fim</div>
                            <input type="text" name="anoFim" class="form-control" placeholder="Fim"
                                aria-describedby="input-group-4">
                        </div>

                    </div>
                </div>



                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Montadora</label>
                    <div class="mt-2">
                        <select name="idMontadora" data-placeholder="Seleciona a Montadora" class="tom-select w-full">

                            @foreach ($montadoras as $montadora)
                            <option value="{{$montadora->id}}">{{  $montadora->nome }}</option>
                            @endforeach


                        </select>
                    </div>

                </div>

                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Linhas</label>
                    <div class="mt-2">
                        <select name="idLinha" data-placeholder="Seleciona a Linha" class="tom-select w-full">

                            @foreach ($linhas as $linha)
                            <option value="{{$linha->id}}">{{  $linha->nome }}</option>
                            @endforeach


                        </select>
                    </div>

                </div>




                <div class="text-right mt-5">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>
</div>
@endsection