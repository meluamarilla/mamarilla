@extends('layouts.master')

@section('content')

    <h1>Denuncia </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th><th>Cédula de Identidad</th><th>Nombre</th><th>Apellido</th><th>Tipo Denuncia</th><th>Fecha</th><th>Veracidad</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($denuncia as $item)
              {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id_denuncia }}</td> <td>{{ $item->cuenta->ci }}</td><td>{{ $item->cuenta->nombre }}</td><td>{{ $item->cuenta->apellido }}</td><td>{{ $item->tipo->descripcion }}</td><td>{{ $item->fecha }}</td> <td>{{ $item->veracidad }}</td>
                   
                    <td> 
                        <a href="{{ url('denuncia/' . $item->id_denuncia . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> <!--/
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['denuncia', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                         -->
                    </td> 
                  
                </tr>
               
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $denuncia->render() !!} </div>
    </div>

@endsection
