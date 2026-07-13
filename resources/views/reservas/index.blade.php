@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis Reservas</h1>
    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- Mensajes de error --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>

    @endif

    @if($reservas->isEmpty())
        <div class="alert alert-info">
            No tienes reservas realizadas aún.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Personas</th>
                    <th>Precio Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        {{-- mostrar nombre del destino --}}
                        <td>{{ $reserva->destino->name }}</td>
                        <td>{{ $reserva->fecha_reserva }}</td>
                        <td>{{ $reserva->numero_personas }}</td>
                        <td>S/. {{ $reserva->precio_total }}</td>
                        <td>{{ ucfirst($reserva->estado) }}</td>
                        <td>
                            <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta reserva?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('reservas.create') }}" class="btn btn-success">Nueva Reserva</a>
    <div class="container pb-5">
</div>
@endsection


