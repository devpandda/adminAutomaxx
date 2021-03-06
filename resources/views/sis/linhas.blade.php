@extends('../layout/' . $layout)

@section('subhead')
    <title>Linhas de Modelos de Aplicação</title>
@endsection







                                    
                                       
                                    
                                

@section('subcontent')


   
        
       
       
        
   
    


    <h2 class="intro-y text-lg font-medium mt-10">Controle de Linhas de Aplicação</h2>
    @if (session('message'))
    <div class="alert alert-success alert-dismissible show flex items-center mb-2" role="alert">
        <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session('message')}} 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <i data-feather="x" class="w-4 h-4"></i>
        </button>
    </div>
    @endif     
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('linhas.create')  }}"><button class="btn btn-primary shadow-md mr-2" >Adicionar nova Linha</button></a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="printer" class="w-4 h-4 mr-2"></i> Imprimir
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Exportar PDF
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="hidden md:block mx-auto text-gray-600">Mostrando {{ count($linhas) }} registros</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <form action="{{ route('linhas.search') }}" method="post">
                        @csrf
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" name="search" id="search" placeholder="Search...">
                    <button type="submit"><i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i></button>
                </form>
                </div>
            </div>
        </div>
        
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="whitespace-nowrap">Linha</th>
                        
                        
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    

                    @foreach ($linhas as $linha)

                    <tr class="intro-x">
                        <td class="w-40">{{ $linha->id }}</td>
                        
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $linha->nome }}</a>
                            <div class="text-gray-600 text-xs whitespace-nowrap mt-0.5">{{ $linha->descricao }}</div>
                        </td>
                        
                        
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('linhas.edit', $linha->id) }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar
                                </a>
                                <a class="flex items-center text-theme-6" href="javascript:;"  data-toggle="modal" data-target="#delete-confirmation-modal{{ $linha->id }}">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                        
                    @endforeach




                    
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        


      


        @if (isset($filters))
        {{ $linhas->appends($filters)->links('layout.paginator'); }}
        @else
        {{ $linhas->links('layout.paginator'); }}
        @endif
    </div>



    @foreach ($linhas as $linha)




    <div id="delete-confirmation-modal{{ $linha->id }}" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                      
                        
                        <div class="text-3xl mt-5">Excluir Registro: {{ $linha->nome }} ?</div>
                        <div class="text-gray-600 mt-2">Você tem certeza que deseja excluir o registro de linha? <br>Este processo não pode ser desfeito.</div>
                    </div>
                    
                        

                        <form action="{{ route('linhas.destroy', $linha->id) }}" method="post">
                            <div class="px-5 pb-8 text-center">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancelar</button>
                                <button type="submit" class="btn btn-danger w-24">Deletar</button>
                            </div>
                        </form>
                   
                </div>
            </div>
        </div>
    </div>





                        
                    @endforeach



                

               
   
@endsection