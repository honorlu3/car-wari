@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>

    <form action ="{{route('admin.reservas.store')}}" method="POST">
        @csrf

        <div class="mb-3">
            <label for = "user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Selecciona un usuario --</option>
                @foreach ($usuarios as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="destino_id" class="form-label">Destino</label>
            <select name="destino_id" id="destino_id" class="form-select" required>
                <option value="">-- Selecciona un destino --</option>
                @foreach ($destinos as $destino)
                    <option value="{{ $destino->id }}">
                        {{ $destino->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_reserva" class="form-label">Fecha de la reserva</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="numero_personas" class="form-label">Número de personas</label>
            <input type="number" name="numero_personas" id="numero_personas" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Confirmar Reserva</button>
        <a href="{{ route('admin.reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection