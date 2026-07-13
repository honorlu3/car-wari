@extends('layouts.admin')

@section('title','Destinos - Admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Destinos</h2>
    <a href="{{ route('admin.destinations.create') }}" class="btn btn-success">Crear destino</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Ubicación</th>
            <th>Precio</th>
            <th>Creado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($destinations as $d)
            <tr>
                <td>
                    @if($d->image)
                        <img src="{{ asset('storage/'.$d->image) }}" alt="{{ $d->name }}" width="100" height="60" style="object-fit: cover;" class="rounded shadow-sm">
                    @else
                        <span class="text-muted">No image</span>
                    @endif
                <td>{{ $d->name }}</td>
                <td>{{ $d->location }}</td>
                <td>{{ $d->price ?? '-' }}</td>
                <td>{{ $d->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('admin.destinations.edit', $d) }}" class="btn btn-sm btn-primary">Editar</a>

                    <form action="{{ route('admin.destinations.destroy', $d) }}" method="POST" class="d-inline" onsubmit="return confirm('Eliminar destino?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No hay destinos</td></tr>
        @endforelse
    </tbody>
</table>

{{ $destinations->links() }}
@endsection
