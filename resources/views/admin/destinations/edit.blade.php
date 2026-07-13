@extends('layouts.admin')

@section('title','Editar Destino')

@section('content')
<h2>Editar Destino</h2>

<form action="{{ route('admin.destinations.update', $destination) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input class="form-control" name="name" value="{{ old('name', $destination->name) }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Ubicación</label>
        <input class="form-control" name="location" value="{{ old('location', $destination->location) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input class="form-control" name="price" value="{{ old('price', $destination->price) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" rows="4">{{ old('description', $destination->description) }}</textarea>
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
