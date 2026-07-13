@extends('layouts.admin')

@section('content')
<div class ="container">
    <h1>Editar reserva</h1>

    <form action="{{ route('admin.reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for = "user_id" class="form-label">Usuario</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach ($usuarios as $user)
                    <option value="{{ $user->id }}" {{($reserva->user_id == $user->id ? 'selected' : '')}}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="destino_id" class="form-label">Destino</label>
            <select name="destino_id" id="destino_id" class="form-select" required>
                @foreach ($destinos as $destino)
                    <option value="{{ $destino->id }}" 
                        {{($reserva->destino_id == $destino->id ? 'selected' : '')}}>
                        {{ $destino->name }}
                    </option>
                @endforeach 
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_reserva" class="form-label">Fecha de la reserva</label>
            <input type="date" name="fecha_reserva" id="fecha_reserva" class="form-control" value="{{ $reserva->fecha_reserva }}" required>
        </div>

        <div class="mb-3">
            <label for="numero_personas" class="form-label">Número de personas</label>
            <input type="number" name="numero_personas" id="numero_personas" class="form-control" min="1" value="{{ $reserva->numero_personas }}" required>
        </div>

        <div clas="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="pendiente" {{($reserva->estado == 'pendiente' ? 'selected' : '')}}>Pendiente</option>
                <option value="confirmada" {{($reserva->estado == 'confirmada' ? 'selected' : '')}}>Confirmada</option>              
                <option value="cancelada" {{($reserva->estado == 'cancelada' ? 'selected' : '')}}>Cancelada</option>
            </select>

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Actualizar Reserva</button>
        <a href="{{ route('admin.reservas.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>
    {{--  Botón de WhatsApp (si se genera enlace después de confirmar) --}}
    @if(session('whatsapp_url'))
        <div class="mt-3">
            <a href="{{ session('whatsapp_url') }}" target="_blank" class="btn btn-success">
                 Enviar mensaje por WhatsApp
            </a>
        </div>
    @endif

</div>
@endsection

