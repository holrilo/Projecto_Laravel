@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Gasto
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/gastosa/' . $gastos->id_gasto ) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            @include('gastosa.form',['ejecutar'=>'Editar'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
