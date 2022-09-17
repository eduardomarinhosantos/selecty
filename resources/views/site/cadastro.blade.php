@extends('site.template.main')

@section('conteudo')

<meta name="token" content="{{ csrf_token() }}">

<!-- Page Heading -->
<p class="mb-4">Realize seu Cadastro</p>

@include('adm.flash')

<!-- DataTales Example -->
<div id="app" class="card shadow mb-4"></div>

@endsection 

@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('js/site/cadastro.js') }}"></script>
@endsection