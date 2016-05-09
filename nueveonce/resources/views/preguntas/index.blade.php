@extends('layouts.master')

@section('content')

    <h1>Preguntas <a href="{{ url('preguntas/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nueva Pregunta</a></h1>
    <p>Se encontraron {{ $preguntas->total() }} registros</p>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th><th>Descripción</th><th>Tipo</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
           
            
            @foreach($preguntas as $item)
            
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item-> id_preguntas }}</td><td>{{ $item-> descripcion }}</td><td>{{ $item->tipo->descripcion }}</td>
                    
                    <td>
                        <a href="{{ url('preguntas/' . $item-> id_preguntas . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['preguntas', $item-> id_preguntas],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!} 
                    </td>
                </tr>
              @endforeach
          
            </tbody>
        </table>
        <div class="pagination"> {!! $preguntas->render() !!} </div>
    </div>

@endsection
