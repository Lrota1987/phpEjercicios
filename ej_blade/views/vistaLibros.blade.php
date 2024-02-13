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
            <th scope="col">isbn</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Stock</th>
            <th scope="col">Precio</th>
        </tr>
        </thead>
        <tbody>
@foreach($libros as $fila)
            <tr class="text-center">
                <th scope="row">{{$fila['id']}}</th>
                <td>{{$fila['isbn']}}</td>
                <td>{{$fila['title']}}</td>
                <td>{{$fila['author']}}</td>
                <td>{{$fila['stock']}}</td>
                <td>{{$fila['price']}}</td>      
            </tr>
        @endforeach
        </tbody>
    </table>

    <p></p>

    <script>
        function handleClick()  {
            window.location.href ='/ej_blade/public/clientes.php';
        }
    </script>
    <button onclick="handleClick()">CLIENTES</button>
@endsection