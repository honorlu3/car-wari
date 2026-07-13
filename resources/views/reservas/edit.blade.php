@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Reserva</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        {{-- seleccionar destino --}}
    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="destino_id" class="form-label">Destino</label>
            <select name="destino_id" id="destino_id" class="form-control" required>
                @foreach($destinos as $destino)
                    <option value="{{ $destino->id }}" 
                        {{ $reserva->destino_id == $destino->id ? 'selected' : '' }}>
                        {{ $destino->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_reserva" class="form-label">Fecha</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control" value="{{ $reserva->fecha }}" required>
        </div>

        <div class="mb-3">
            <label for="numero_personas" class="form-label">Número de personas</label>
            <input type="number" name="numero_personas" id="numero_personas" class="form-control" value="{{ $reserva->personas }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
