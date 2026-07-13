@extends('layouts.admin')

@section('content')
<h1>Usuarios</h1>

<a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)
            <tr>
                <td>{{ $u->id }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->phone }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    <a href="{{ route('admin.users.show', $u) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('admin.users.edit', $u) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('admin.users.destroy', $u) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
