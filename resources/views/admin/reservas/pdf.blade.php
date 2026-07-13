<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Reservas</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Reservas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Destino</th>
                <th>Fecha Reserva</th>
                <th>N° Personas</th>
                <th>Estado</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->user->name }}</td>
                <td>{{ $r->destino->name }}</td>
                <td>{{ $r->fecha_reserva }}</td>
                <td>{{ $r->numero_personas }}</td>
                <td>{{ $r->estado }}</td>
                <td>S/ {{ number_format($r->precio_total, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
