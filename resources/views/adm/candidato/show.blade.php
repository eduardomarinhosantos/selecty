@extends('adm.template.main')

@section('conteudo')

<!-- Page Heading -->
<p class="mb-4">Candidato criado em 
{{ Helper::datahorarioBDtoBR($candidato->created_at) }}
e alterado pela última vez em
{{ Helper::datahorarioBDtoBR($candidato->updated_at) }}
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td class="titulo_show"> Nome </td>
                        <td>{{ $candidato->nome }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Email </td>
                        <td>{{ $candidato->email }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Telefone </td>
                        <td>{{ $candidato->telefone }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show"> Usuário </td>
                        <td>{{ $candidato->usuario }}</td>
                    </tr>
                    <tr>
                        <td class="titulo_show">Editar</td>
                        <td>
                            <a href="{{ route('candidato.edit', $candidato->id) }}">
                                <span class="fa fa-pencil-alt"></span>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="titulo_show">Deletar</td>
                        <td>
                            {!! Form::open(['route' => ['candidato.destroy', $candidato->id], 'method' => 'DELETE', 'class' => 'form-deletar']) !!}
                                {{ Form::button('<span class="fa fa-trash"></span>', 
                                    ['type' => 'submit', 'style' => 'color:red', 'class'=>"delete-button"] )  
                                }}                        
                            {!! Form::close() !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Formação Acadêmica -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formação Acadêmica</h6>
    </div>
    <div class="card-body">
            
        <div class="table-responsive">
            <table class="table table-bordered display" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Início</th>
                    <th>Término</th>                   
                    <th>Detalhes</th>
                    <th width="5%">Editar</th>
                    <th width="5%">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @foreach($candidato->formacao_academica as $formacao_academica)
                    <tr>
                        <td>{{ $formacao_academica->instituicao }}</td>
                        <td>{{ Helper::dataBDtoBR( $formacao_academica->data_inicio ) }}</td>
                        <td>{{ Helper::dataBDtoBR( $formacao_academica->data_termino ) }}</td>
                        <td>{{ $formacao_academica->descricao }}</td>
                        
                        <td class="text-center">
                            <a href="{{ route('formacaoacademica.edit', $formacao_academica->id) }}">
                                <span class="fa fa-pencil-alt"></span>
                            </a>
                        </td>
                        <td class="text-center">
                            {!! Form::open(['route' => ['formacaoacademica.destroy', $candidato->id], 'method' => 'DELETE', 'class' => 'form-deletar']) !!}
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

<!-- Experiência Profissional -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Experiência Profissional</h6>
    </div>
    <div class="card-body">
            
        <div class="table-responsive">
            <table class="table table-bordered display" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Empresa</th>
                        <th>Adimissão</th>
                        <th>Demissão</th>
                        <th>Detalhes</th>
                        <th width="5%">Editar</th>
                        <th width="5%">Excluir</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($candidato->experiencia_profissional as $experiencia_profissional)
                    <tr>
                        <td>{{ $experiencia_profissional->empresa }}</td>
                        <td>{{ Helper::dataBDtoBR( $experiencia_profissional->data_admissao) }}</td>
                        <td>{{ Helper::dataBDtoBR( $experiencia_profissional->data_demissao) }}</td>
                        <td>{{ $experiencia_profissional->descricao }}</td>                        
                        <td class="text-center">
                            <a href="{{ route('experienciaprofissional.edit', $experiencia_profissional->id) }}">
                                <span class="fa fa-pencil-alt"></span>
                            </a>
                        </td>
                        <td class="text-center">
                            {!! Form::open(['route' => ['experienciaprofissional.destroy', $candidato->id], 'method' => 'DELETE', 'class' => 'form-deletar']) !!}
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