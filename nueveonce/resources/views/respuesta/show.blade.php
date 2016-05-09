@extends('layouts.master')

@section('content')

    <h1>Respuestum</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $respuestum->id }}</td> 
                </tr>
            </tbody>    
        </table>
    </div>

@endsection