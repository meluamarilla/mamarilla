@extends('layouts.master')

@section('content')

    <h1>Edit Tipo Denuncia</h1>
    <hr/>

    {!! Form::model($tipodenuncium, [
        'method' => 'PATCH',
        'url' => ['tipodenuncia', $tipodenuncium->id_tipo_denuncia],
        'class' => 'form-horizontal'
    ]) !!}

    
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
     <div class="panel-heading">Tipo Denuncia</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form">
                {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Descripción</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="descripcion" value="{{ $tipodenuncium->descripcion }}">
                        </div>
                    </div>
                    
        </div>
    
    <div class="form-group">
         <div class="col-md-6 col-md-offset-4"> 
            <!--{!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!} -->
            <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Guardar
                                </button>
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