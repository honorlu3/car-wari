@extends('layouts.app')

@section('title','Contacto | Car Wari')

@section('content')
<div class="container">
    <h1 class="text-primary">Contacto</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <p class="lead">Escríbenos a través del siguiente formulario:</p>

    <form action="{{ route('enviar.contacto') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Enviar</button>
        <div class="container pb-5">
    </form>
</div>
@endsection
