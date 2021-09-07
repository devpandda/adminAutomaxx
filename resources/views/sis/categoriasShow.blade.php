@extends('../layout/' . $layout)

@section('subhead')
<title>Atributos da Categoria</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Categoria: {{ $categoria->nome }} - VISUALIZAÇÂO</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 2xl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5 lg:mt-0">
            <div class="relative flex items-center p-5">

                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">Nome: {{ $categoria->nome}}</div>
                    <div class="text-gray-600">Descrição: {{  $categoria->descricao}}</div>
                </div>

            </div>


            <div class="p-5 border-t border-gray-200 dark:border-dark-5 flex">
                <a href="{{route('categorias.edit', $categoria->id)}}"><button type="button" class="btn btn-primary py-1 px-2">Editar</button></a>
                <a class="py-1 px-2 ml-auto" href="{{route('categorias.index')}}"><button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto" oncl>Voltar</button></a>
            </div>
        </div>

    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Daily Sales -->
            <div class="intro-y box col-span-12 2xl:col-span-12">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                    <h2 class="font-medium text-base mr-auto">Atributos da Categorias</h2>

                    <a href="javascript:;" data-toggle="modal" data-target="#add-atributo-modal" class="flex items-center text-theme-6"><button class="btn btn-elevated-success ">Vincular Novo Atributo</button></a>
                   
                    
                </div>
                <div class="p-5">

                    <table class="table">
                        <thead>
                            <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                <th class="whitespace-nowrap">#</th>
                                <th class="whitespace-nowrap">Nome</th>
                                <th class="whitespace-nowrap">Descrição</th>
                                <th class="whitespace-nowrap">Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($atributos as $atributo)
                            <tr>
                                <td class="border-b dark:border-dark-5">{{ $atributo->id}}</td>
                                <td class="border-b dark:border-dark-5">{{  $atributo->nome}}</td>
                                <td class="border-b dark:border-dark-5">{{ $atributo->descricao}}</td>
                                <td class="border-b dark:border-dark-5">

                                    <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal"
                                data-target="#delete-confirmation-modal{{ $atributo->id }}">
                                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Deletar
                            </a>
                                   
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
            <!-- END: Daily Sales -->






        </div>
    </div>
</div>



                                    
                                      
                                        <!-- END: Modal Toggle -->
                                        <!-- BEGIN: Modal Content -->
                                        <div id="add-atributo-modal" class="modal" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- BEGIN: Modal Header -->
                                                    <form action="{{ route('categorias.update.atributo', $categoria->id) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                    <div class="modal-header">
                                                        <h2 class="font-medium text-base mr-auto">Escolha um Atributo</h2>
                                                        
                                                    </div>
                                                    <!-- END: Modal Header -->
                                                    <!-- BEGIN: Modal Body -->
                                                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                        <div class="col-span-12 sm:col-span-12">


                                                            
                                                                <label for="modal-form-1" class="form-label">Atributos</label>
                                                                <div class="mt-2">
                                                                    <select data-placeholder="Selecione o atributo a vincular" name="idAtributo" class="tom-select w-full">
                                                                        @foreach ($allatributos as $atribu)
                                                                        <option value="{{ $atribu->id}}">{{ $atribu->nome}}</option>
                                                                        @endforeach
                                                                        
                                                                       
                                                                    </select>
                                                                </div>
                                                            



                                                            
                                                        </div>
                                                       
                                                        
                                                        
                                                        
                                                      
                                                    </div>
                                                    <!-- END: Modal Body -->
                                                    <!-- BEGIN: Modal Footer -->
                                                    <div class="modal-footer text-right">
                                                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary w-20">Vincular</button>
                                                    </div>
                                                    </form>
                                                    <!-- END: Modal Footer -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END: Modal Content -->
                                    
                                






@foreach ($atributos as $atributo)




<div id="delete-confirmation-modal{{ $atributo->id }}" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>


                    <div class="text-3xl mt-5">Excluir Registro: {{ $atributo->nome }} ?</div>
                    <div class="text-gray-600 mt-2">Você tem certeza que deseja excluir o registro de linha? <br>Este
                        processo não pode ser desfeito.</div>
                </div>



                <form action="{{ route('categorias.destroy.atributo', ['id' => $categoria->id, 'idatributo' => $atributo->id]) }}" method="post">
                    <div class="px-5 pb-8 text-center">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-outline-secondary w-24 mr-1">Cancelar</button>
                        <button type="submit" class="btn btn-danger w-24">Deletar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>






@endforeach
@endsection