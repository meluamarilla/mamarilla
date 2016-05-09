@extends('layouts.master')

@section('content')

    <h1>Editar Respuesta</h1>
    <hr/>

    {!! Form::model($respuestum, [
        'method' => 'PATCH',
        'url' => ['respuesta', $respuestum->id_respuesta],
        'class' => 'form-horizontal'
    ]) !!}

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
     <div class="panel-heading">Respuesta</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form">
                {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-md-4 control-label">Descripcion</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="descripcion" value="{{ $respuestum->descripcion }}">
                        </div>
                    <label class="col-md-4 control-label">Id Pregunta</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="id_preguntas" value="{{ $respuestum->id_preguntas }}">
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