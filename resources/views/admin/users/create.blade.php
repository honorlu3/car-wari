@extends('layouts.admin')

@section('content')
<h1>Crear Usuario</h1>

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>


    <div class="mb-3">
        <label>Rol</label>
        <select name="role" class="form-control" required>
            <option value="user">Usuario</option>
            <option value="admin">Administrador</option>
        </select>
    </div>

    <button class="btn btn-success">Guardar</button>
</form>
@endsection
