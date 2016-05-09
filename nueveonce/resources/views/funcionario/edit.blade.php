@extends('layouts.master')

@section('content')

<h1><center>Editar Funcionario</center></h1>
    <hr/>

    {!! Form::model($funcionario, [
        'method' => 'PATCH',
        'url' => ['funcionario', $funcionario->id_funcionario],
        'class' => 'form-horizontal'
    ]) !!}

   
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
     <div class="panel-heading">Funcionario</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form">
                {!! csrf_field() !!}
                    <div class="form-group">
                    <label class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nombre" value="{{ $funcionario->nombre }}">
                            </div>
                    </div>
                    
                    <div class="form-group">
                    <label class="col-md-4 control-label">Apellido</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="apellido" value="{{ $funcionario->apellido }}">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label">Ci</label>
                        <div class="col-md-6">
                             <input type="text" class="form-control" name="apellido" value="{{ $funcionario->ci }}">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label">Rango</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="rango" value="{{ $funcionario->rango }}"> 
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label">Dirección</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="direccion" value="{{ $funcionario->direccion }}">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <label class="col-md-4 control-label">Teléfono</label>            
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="telefono" value="{{ $funcionario->telefono }}">
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
    </div>
</div>
        </div>
    </div>
@endsection