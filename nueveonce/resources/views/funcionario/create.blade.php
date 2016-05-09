@extends('layouts.master')

@section('content')

<h1><center>Crear Nuevo Funcionario</center></h1>
    <hr/>

    {!! Form::open(['url' => 'funcionario', 'class' => 'form-horizontal']) !!}

    
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
     <div class="panel-heading">Funcionario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/funcionario/create') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Apellido</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}">

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('ci') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Ci</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ci" value="{{ old('ci') }}">

                                @if ($errors->has('ci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('rango') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Rango</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="rango" value="{{ old('rango') }}">

                                @if ($errors->has('rango'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rango') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dirección</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Teléfono</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
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