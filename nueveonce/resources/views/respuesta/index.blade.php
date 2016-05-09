@extends('layouts.master')

@section('content')

    <h1>Respuesta <a href="{{ url('respuesta/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Respuesta</a></h1>
    <p>Se encontraron {{ $respuesta->total() }} registros</p>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th><th>Descripción</th><th>Id Pregunta</th><th>Descripcion Pregunta</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($respuesta as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id_respuesta }}</td><td>{{ $item-> descripcion }}</td><td>{{ $item-> id_preguntas }}</td> <td>{{ $item->preguntas->descripcion }}</td>
                    
                    <td>
                        <a href="{{ url('respuesta/' . $item->id_respuesta . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['respuesta', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $respuesta->render() !!} </div>
    </div>

@endsection
