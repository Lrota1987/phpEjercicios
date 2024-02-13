@extends('plantillas.vista')
    @section('titulo')
        clientes
    @endsection
    @section('encabezado')
        CLIENTES: {{count($customers)}}
    @endsection
    @section('contenido')
    
        <div>
            <table>
                <thead>
                    <tr>
                        <th>FIRSTNAME</th>
                        &nbsp;
                        <th>SURNAME</th>
                        &nbsp;
                        <th>EMAIL</th>
                        &nbsp;
                        <th>TYPE</th>
                    </tr>
                </thead>
                @forelse($customers as $customer)
                <tr>
                    <td>{{$customer->firstname}}</td>
                    <td>{{$customer->surname}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->title}}</td>
                </tr>
                @empty
                <h5>No data</h5>
                @endforelse
            </table>
        </div>

        <style>
            table, th, td {
                padding: 10px;
                text-align: left;
            }
        </style>

    @endsection