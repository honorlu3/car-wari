@extends('layouts.admin')

@section('content')
<div class="container">

    <h1 class="mb-4">Detalle de la Reserva</h1>

    {{-- Mensajes --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Información --}}
    <ul class="list-group mb-4">
        <li class="list-group-item">
            <strong>ID:</strong> {{ $reserva->id }}
        </li>

        <li class="list-group-item">
            <strong>Usuario:</strong>
            {{ $reserva->user->name }}
            ({{ $reserva->user->email }})
        </li>

        <li class="list-group-item">
            <strong>Teléfono:</strong>
            {{ $reserva->user->phone ?? 'No registrado' }}
        </li>

        <li class="list-group-item">
            <strong>Destino:</strong>
            {{ $reserva->destino->name }}
        </li>

        <li class="list-group-item">
            <strong>Fecha:</strong>
            {{ $reserva->fecha_reserva }}
        </li>

        <li class="list-group-item">
            <strong>Número de Personas:</strong>
            {{ $reserva->numero_personas }}
        </li>

        <li class="list-group-item">
            <strong>Precio Total:</strong>
            S/. {{ number_format($reserva->precio_total,2) }}
        </li>

        <li class="list-group-item">

            <strong>Estado:</strong>

            @if($reserva->estado=='pendiente')

                <span class="badge bg-warning">
                    Pendiente
                </span>

            @elseif($reserva->estado=='confirmada')

                <span class="badge bg-success">
                    Confirmada
                </span>

            @elseif($reserva->estado=='cancelada')

                <span class="badge bg-danger">
                    Cancelada
                </span>

            @endif

        </li>

    </ul>

    {{-- BOTONES CUANDO ESTÁ PENDIENTE --}}
    @if($reserva->estado=='pendiente')

        <form action="{{ route('admin.reservas.confirmar',$reserva) }}"
              method="POST"
              style="display:inline-block">

            @csrf
            @method('PUT')

            <button class="btn btn-success">
                ✔ Confirmar Reserva
            </button>

        </form>

        <form action="{{ route('admin.reservas.rechazar',$reserva) }}"
              method="POST"
              style="display:inline-block">

            @csrf
            @method('PUT')

            <button
                class="btn btn-danger"
                onclick="return confirm('¿Desea rechazar esta reserva?')">

                ✖ Rechazar Reserva

            </button>

        </form>

    @endif


    {{-- BOTONES CUANDO YA ESTÁ CONFIRMADA --}}
    @if($reserva->estado=='confirmada')

        {{-- WhatsApp --}}

        @if($reserva->user->phone)

            @php

                $mensaje = "Hola {$reserva->user->name},

Tu reserva ha sido CONFIRMADA.

Destino:
{$reserva->destino->name}

Fecha:
{$reserva->fecha_reserva}

Personas:
{$reserva->numero_personas}

Total:
S/. {$reserva->precio_total}

¡Gracias por confiar en nosotros!";

                $whatsappUrl = "https://wa.me/51{$reserva->user->phone}?text=" . urlencode($mensaje);

            @endphp

            <a href="{{ $whatsappUrl }}"
               target="_blank"
               class="btn btn-success">

                📱 Enviar WhatsApp

            </a>

        @endif


        {{-- Correo --}}

        <a href="{{ route('admin.reservas.enviarCorreo',$reserva->id) }}"
           class="btn btn-primary">

            📧 Enviar Correo

        </a>

    @endif


    {{-- SI ESTÁ CANCELADA --}}
    @if($reserva->estado=='cancelada')

        <div class="alert alert-danger mt-3">

            Esta reserva fue cancelada.

        </div>

    @endif


    <hr>

    <a href="{{ route('admin.reservas.index') }}"
       class="btn btn-secondary">

        ← Volver

    </a>

</div>
@endsection