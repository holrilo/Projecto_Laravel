<form action="{{ url('/clientes/') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('clientes.form',['ejecutar'=>'Crear'])
</form>