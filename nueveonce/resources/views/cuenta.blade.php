@extends('layouts.app')

@section('content')

@foreach($cuentas as $cuenta)
    @if($cuenta->nombre=='melu')
        <p>nombre: {{ $cuenta->nombre }} </p>
    @endif
@endforeach


@endsection