@extends('adm.template.main')

@section('conteudo')

<!-- Page Heading -->
<p class="mb-4">Editar Candidato</p>

@include('adm.flash')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        {!! Form::model($candidato, ['route' => ['candidato.update', $candidato->id], 'method' => 'put', 'id' => 'editar', 'autocomplete' => 'off']) !!}
        <div class='form-group'>
            {!! Form::text('nome', null, ['placeholder'=>'Nome', 'class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::text('email', null, ['placeholder'=>'E-mail', 'class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::text('telefone', null, ['placeholder'=>'Telefone', 'class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::text('usuario', null, ['placeholder'=>'Usuário', 'class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::password('senha', ['placeholder'=>'Senha - Preencha apenas se quiser alterar', 'class' => 'form-control', 'maxlength' => 8]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Editar', ['class' => 'btn btn-primary float-right']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection 

@section('js')
    <script src="{{ asset('js/adm/candidato/create-edit.js') }}"></script>
@endsection