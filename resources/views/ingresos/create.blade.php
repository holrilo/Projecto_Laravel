@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Añadir Nuevo Ingreso
                </div>
                <div class="card-body">
                    <form action="{{ url('/ingresos/') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('ingresos.form',['ejecutar'=>'Crear'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection