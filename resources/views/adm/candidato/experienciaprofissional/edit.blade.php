@extends('adm.template.main')

@section('conteudo')

<!-- Page Heading -->
<p class="mb-4">Editar Experiência Profissional</p>

@include('adm.flash')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        {!! Form::model($experienciaprofissional, ['route' => ['experienciaprofissional.update', $experienciaprofissional->id], 'method' => 'put', 'id' => 'editar', 'autocomplete' => 'off']) !!}
        <div class='form-group'>
            <strong>{{ $experienciaprofissional->candidato->nome }}</strong>
        </div>
        <div class='form-group'>
            {!! Form::text('empresa', null, ['placeholder'=>'Empresa', 'class' => 'form-control']) !!}
        </div>
        <div class='form-group'>
            {!! Form::text('data_admissao', Helper::dataBDtoBR($experienciaprofissional->data_admissao), ['placeholder'=>'Data de Admissão', 'class' => 'form-control data']) !!}
        </div>
        <div class='form-group'>
            {!! Form::text('data_demissao', Helper::dataBDtoBR($experienciaprofissional->data_demissao), ['placeholder'=>'Data de Demissão', 'class' => 'form-control data']) !!}
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
    <script src="{{ asset('js/adm/candidato/experienciaprofissional/create-edit.js') }}"></script>
@endsection