@extends('layouts.master')

@section('content')

    <h1>Crear Nueva Pregunta</h1>
    <hr/>

    {!! Form::open(['url' => 'preguntas', 'class' => 'form-horizontal']) !!}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
     <div class="panel-heading">Pregunta</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/pregunta/create') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('id_tipo') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Id Tipo Denuncia</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="id_tipo" value="{{ old('id_tipo') }}">

                                @if ($errors->has('id_tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
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