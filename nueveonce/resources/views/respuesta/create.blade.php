@extends('layouts.master')

@section('content')

    <h1>Create New Respuestum</h1>
    <hr/>

    {!! Form::open(['url' => 'respuesta', 'class' => 'form-horizontal']) !!}
    
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
     <div class="panel-heading">Respuesta</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/respuesta/create') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">

                                @if ($errors->has('descripcion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('id_preguntas') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Id Pregunta</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="id_preguntas" value="{{ old('id_preguntas') }}">

                                @if ($errors->has('id_preguntas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_preguntas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Crear
                                </button>
                            </div>
                        </div>
                        
    </div>
     </div>
            </div>
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