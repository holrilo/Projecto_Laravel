@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Añadir Nuevo Gasto
                </div>
                <div class="card-body">
                    <form action="{{ url('/gastosa/') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('gastosa.form',['ejecutar'=>'Crear'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection