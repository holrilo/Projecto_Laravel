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
                        <form action="{{ url('/ingresos/' . $ingresos->id_ingreso ) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            @include('ingresos.form',['ejecutar'=>'Editar'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
