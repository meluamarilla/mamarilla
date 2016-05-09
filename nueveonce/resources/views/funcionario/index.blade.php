@extends('layouts.master')

@section('content')

    <h1>Funcionario <a href="{{ url('funcionario/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Funcionario</a></h1>
    <p>Se encontraron {{ $funcionario->total() }} registros</p>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th><th>Nombre</th><th>Apellido</th><th>CI</th><th>Rango</th><th>Direccion</th><th>Telefono</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                {!! Form::open(['route' => 'funcionario.index', 'method' => 'GET', 'class' => 'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                <div class="form-group">
                    {!! Form::text('ci', null, ['class' => 'form-control', 'placeholder' => 'Buscar por CI']) !!}
                    <button type="submit" class="btn btn-default">Buscar</button>
                </div>
                
            {!! Form::close() !!}
                
            {{-- */$x=0;/* --}}
            @foreach($funcionario as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id_funcionario }}</td> <td>{{ $item-> nombre }}</td> <td>{{ $item-> apellido }}</td> <td>{{ $item-> ci }}</td> <td>{{ $item-> rango}}</td> <td>{{ $item-> direccion }}</td> <td>{{ $item-> telefono }}</td>
                    
                    <td>
                        <a href="{{ url('funcionario/' . $item->id_funcionario . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['funcionario', $item->id_funcionario],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $funcionario->render() !!} </div>
    </div>

@endsection
