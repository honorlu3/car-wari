@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Gestión de Reservas (Admin)</h1>
        <a href="{{ route('admin.reservas.create') }}" class="btn btn-success">Crear Reserva</a>
    </div>
    

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.reservas.export.excel') }}" class="btn btn-primary">Exportar a Excel</a>
        <a href="{{ route('admin.reservas.export.pdf') }}" class="btn btn-secondary">Exportar a PDF</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Destino</th>
                <th>Fecha</th>
                <th>Personas</th>
                <th>Precio total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->id }}</td>
                    <td>{{ $reserva->user->name }}</td>
                    <td>{{ $reserva->destino->name }}</td>
                    <td>{{ $reserva->fecha_reserva }}</td>
                    <td>{{ $reserva->numero_personas }}</td>
                    <td>{{$reserva->precio_total}}</td>
                    <td>
                         @switch($reserva->estado)
                            @case('pendiente')
                            <span class="badge bg-warning text-dark">Pendiente</span>
                         @break
                         @case('confirmada')
                            <span class="badge bg-success">Confirmada</span>
                         @break
                         @case('cancelada')
                           <span class="badge bg-danger">Cancelada</span>
                         @break
                         @case('completada')
                             <span class="badge bg-primary">Completada</span>
                        @break
                         @endswitch
                        </td>
                    <td>    
                        
                        <a href="{{ route('admin.reservas.show', $reserva->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('admin.reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.reservas.destroy', $reserva->id) }}" method="POST" onsubmit="return confirm('¿Eliminar esta reserva?')" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
