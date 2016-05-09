@extends('layouts.master')

@section('content')

    <h1>Tipo Denuncia <a href="{{ url('tipodenuncia/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Tipo Denuncia</a></h1>
    <p>Se encontraron {{ $tipodenuncia->total() }} registros</p>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th><th>Descripcion</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($tipodenuncia as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id_tipo_denuncia }}</td><td>{{ $item->descripcion }}</td>
                    
                    <td>
                        <a href="{{ url('tipodenuncia/' . $item->id_tipo_denuncia . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['tipodenuncia', $item->id_tipo_denuncia],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $tipodenuncia->render() !!} </div>
    </div>

@endsection
