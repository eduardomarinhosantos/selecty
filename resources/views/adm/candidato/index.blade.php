@extends('adm.template.main')

@section('conteudo')

<!-- Page Heading -->
<p class="mb-4">Lista de todas os Candidatos cadastrados no sistema.</p>

@include('adm.flash')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered display" id="tabelaEmpresas" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th width="5%">Detalhes</th>
                        <th width="5%">Editar</th>
                        <th width="5%">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($registros as $candidato)
                        <tr>
                            <td>{{ $candidato->nome }}</td>
                            <td>{{ $candidato->email }}</td>
                            <td>{{ $candidato->telefone }}</td>
                            <td class="text-center">
                                <a href="{{ route('candidato.show', $candidato->id) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('candidato.edit', $candidato->id) }}">
                                    <span class="fa fa-pencil-alt"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                {!! Form::open(['route' => ['candidato.destroy', $candidato->id], 'method' => 'DELETE', 'class' => 'form-deletar']) !!}
                                    {{ Form::button('<span class="fa fa-trash"></span>', 
                                        ['type' => 'submit', 'style' => 'color:red', 'class'=>"delete-button"] )  
                                    }}                        
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 

@section('js')
    <script src="{{ asset('js/adm/candidato/index-show.js') }}"></script>
@endsection