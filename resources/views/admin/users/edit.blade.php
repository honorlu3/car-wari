@extends('layouts.admin')

@section('content')
<h1>Editar Usuario</h1>

<form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>

    <div class="mb-3">
        <label>Nueva Contraseña (opcional)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label>Confirmar Nueva Contraseña</label>
        <input type="password" name="password_confirmation" class="form-control">

    <div class="mb-3">
        <label>Rol</label>
        <select name="role" class="form-control" required>
            <option value="user" @selected($user->role === 'user')>Usuario</option>
            <option value="admin" @selected($user->role === 'admin')>Administrador</option>
        </select>
    </div>

    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
