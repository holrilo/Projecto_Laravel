@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Cliente
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/clientes/' . $clientes->id_cliente) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            @include('clientes.form',['ejecutar'=>'Editar'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
