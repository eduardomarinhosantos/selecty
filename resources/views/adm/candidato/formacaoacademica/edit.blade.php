@extends('adm.template.main')

@section('conteudo')

<!-- Page Heading -->
<p class="mb-4">Editar Formação Acadêmica</p>

@include('adm.flash')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        {!! Form::model($formacaoacademica, ['route' => ['formacaoacademica.update', $formacaoacademica->id], 'method' => 'put', 'id' => 'editar', 'autocomplete' => 'off']) !!}
        <div class='form-group'>
            <strong>{{ $formacaoacademica->candidato->nome }}</strong>
        </div>
        <div class='form-group'>
            {!! Form::text('instituicao', null, ['placeholder'=>'Instituição', 'class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::text('data_inicio', Helper::dataBDtoBR( $formacaoacademica->data_inicio ), ['placeholder'=>'Data de Início', 'class' => 'form-control data']) !!}
        </div>
        <div class='form-group'>
            {!! Form::text('data_termino', Helper::dataBDtoBR( $formacaoacademica->data_termino ), ['placeholder'=>'Data de Término', 'class' => 'form-control data']) !!}
        </div>
        <div class='form-group'>
            {!! Form::textarea('descricao', null, ['placeholder'=>'Descrição', 'class' => 'form-control']) !!}
        </div>        
        <div class="form-group">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection 

@section('js')
    <script src="{{ asset('js/adm/candidato/formacaoacademica/create-edit.js') }}"></script>
@endsection