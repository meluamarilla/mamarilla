@extends('layouts.master')

@section('content')

<h1>Cuenta</h1>
<p>Se encontraron {{ $cuenta->total() }} registros</p>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th><th>Nombre</th><th>Apellido</th><th>CI</th><th>Teléfono</th><th>Direccion</th><th>Dispositivo ID</th><th>Estado</th>
                </tr>
            </thead>
            <tbody>
            {!! Form::open(['route' => 'cuenta.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                <div class="form-group">
                    {!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'Buscar por CI']) !!}
                    <button type="submit" class="btn btn-default">Buscar</button>
                </div>
                
            {!! Form::close() !!}
            
            {{-- */$x=0;/* --}}
                                    
            @foreach($cuenta as $item)
                {{-- */$x++;/* --}} 
                <tr>
                    
                    <td>{{ $item->id_cuenta }}</td><td>{{ $item->nombre }}</td> <td>{{ $item->apellido }}</td> <td>{{ $item->ci }}</td> <td>{{ $item->domicilio }}</td> <td>{{ $item->telefono }}</td><td>{{ $item->dispositivo_id }}</td><td>{{ $item->estado }}</td>    
                    
                   <!-- <td> -->
                       <!-- <a href="{{ url('cuenta/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['cuenta', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!} -->
                    <!--</td>-->
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cuenta->render() !!} </div>
        
    </div>

@endsection
