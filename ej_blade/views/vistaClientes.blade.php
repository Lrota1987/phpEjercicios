@extends('vista')
@section('titulo')
    {{$titulo}}
@endsection
@section('encabezado')
    {{$encabezado}}
@endsection
@section('contenido')
    <table class="table table-striped">
        <thead>
        <tr class="text-center">
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Email</th>
            <th scope="col">Tipo</th>
        </tr>
        </thead>
        <tbody>
@foreach($customers as $fila)
            <tr class="text-center">
                <th scope="row">{{$fila['id']}}</th>
                <td>{{$fila['firstname']}}</td>
                <td>{{$fila['surname']}}</td>
                <td>{{$fila['email']}}</td>
                <td>{{$fila['typee']}}</td>    
            </tr>
@endforeach
        </tbody>
    </table>


    <script>
        function handleClick()  {
            window.location.href ='/ej_blade/public/index.php';
        }
    </script>
    <form action="../public/clientes.php" method="post">
        <label for="numCust">Número de clientes a registrar:</label>
        <input type="number" name="numCust" id="numCust">
        
        <input type="submit" name="actCust" value="Nuevos clientes">
    </form>
    <button onclick="handleClick()">LIBROS</button>

@endsection