@extends('plantillas.vista')
    @section('titulo')
        libros
    @endsection
    @section('encabezado')
        LIBROS DISPONIBLES: {{count($books)}}
    @endsection
    @section('contenido')
    
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ISBN</th>
                        &nbsp;
                        <th>TITLE</th>
                        &nbsp;
                        <th>AUTHOR</th>
                        &nbsp;
                        <th>STOCK</th>
                        &nbsp;
                        <th>PRICE</th>
                    </tr>
                </thead>
                @forelse($books as $book)
                <tr>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->stock}}</td>
                    <td>{{$book->price}}€</td>
                </tr>
                @empty
                <h5>No data</h5>
                @endforelse
            </table>
        </div>
        <a href="{{route('customer.index') }}">customers</a>

        <style>
            table, th, td {
                padding: 10px;
                text-align: left;
            }
        </style>

    @endsection