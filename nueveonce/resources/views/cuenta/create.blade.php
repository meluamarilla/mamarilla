@extends('layouts.master')

@section('content')

    <h1>Crear Nueva Cuenta</h1>
    <hr/>

    {!! Form::open(['url' => 'cuenta', 'class' => 'form-horizontal']) !!}

    

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
                     
            
            {!! Form::submit('Crear', ['class' => 'btn btn-primary form-control']) !!}
            
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection