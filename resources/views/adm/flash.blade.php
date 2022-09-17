@if(Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
        {{ Session::forget('message') }}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger">
        {!! Session::get('error') !!}
        {{ Session::forget('error') }}
    </div>
@endif