@extends('layouts.admin')

@section('title','Crear Destino')

@section('content')
<h2>Crear Destino</h2>

<form action="{{ route('admin.destinations.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input class="form-control" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Ubicación</label>
        <input class="form-control" name="location" value="{{ old('location') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input class="form-control" name="price" value="{{ old('price') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label form="image" class="form-label">Imagen</label>
        <input class="form-control" type="file" id="image" name="image" accept="image/*">

    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
