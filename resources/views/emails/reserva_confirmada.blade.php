<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reserva Confirmada</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f6f6f6; padding: 20px;">
    <div style="background: white; padding: 20px; border-radius: 8px;">
        <h2>¡Hola {{ $reserva->user->name }}!</h2>
        <p>Tu reserva al destino <strong>{{ $reserva->destino->name }}</strong> ha sido <b>confirmada</b>.</p>

        <ul>
            <li>📅 Fecha: {{ $reserva->fecha_reserva }}</li>
            <li>👥 Número de personas: {{ $reserva->numero_personas }}</li>
            <li>💰 Total: S/ {{ number_format($reserva->precio_total, 2) }}</li>
        </ul>

        <p>Gracias por elegir nuestros servicios turísticos 🌄</p>

        <p>— El equipo de <b>Ayacucho Software Enterprise</b></p>
    </div>
</body>
</html>
