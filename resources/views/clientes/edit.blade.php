<form action="{{ url('/clientes/'.$clientes->id_cliente) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH') }}
    @include('clientes.form',['ejecutar'=>'Editar'])
</form>