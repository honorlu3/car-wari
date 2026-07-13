@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>

    {{-- errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf

        {{-- Seleccionar Destino 
        <div class="mb-3">
            <label for="destino_id" class="form-label">Destino</label>
            <select name="destino_id" id="destino_id" class="form-select" required>
                <option value="">-- Selecciona un destino --</option>
                @foreach ($destinos as $destino)
                    <option value="{{ $destino->id }}"
                        @selected(request('destino_id') == $destino->id)> 
                        {{ $destino->nombre }}
                    </option>
                @endforeach
            </select>
        </div> 
        --}}

        {{-- Mostrar destino seleccionado --}}

        @if ($destinoSeleccionado)
            <div class="mb-3">
                <label class="form-label">Destino Seleccionado</label>
                <input type="text" class="form-control" value="{{ $destinoSeleccionado->name }}" disabled>
                <input type="hidden" name="destino_id" value="{{ $destinoSeleccionado->id }}">
            </div>
        @else
            {{-- Si no hay destino seleccionado, mostrar un mensaje o redirigir --}}
            <div class="mb-3">
                <label for="destino_id" class="form-label">Destino</label>
                <select name="destino_id" id="destino_id" class="form-control" required>
                @foreach($destinos as $destino)
                 <option value="{{ $destino->id }}"
                     {{ isset($destinoSeleccionado) && $destinoSeleccionado->id == $destino->id ? 'selected' : '' }}>
                      {{ $destino->name }}
                   </option>
                  @endforeach
                </select>



            </div>

        @endif

        {{-- Fecha de reserva --}}
        <div class="mb-3">
            <label for="fecha_reserva" class="form-label">Fecha de la reserva</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control" required>
        </div>

        {{-- Número de personas --}}
        <div class="mb-3">
            <label for="numero_personas" class="form-label">Número de personas</label>
            <input type="number" name="numero_personas" id="numero_personas" class="form-control" min="1" required>
        </div>

        {{-- Botón enviar --}}
        <button type="submit" class="btn btn-success">Confirmar Reserva</button>
        <a href="{{ route('destinations.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
