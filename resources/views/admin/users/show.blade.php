@extends('layouts.admin')

@section('content')
<h1>Detalle de Usuario</h1>

<ul>
    <li><strong>ID:</strong> {{ $user->id }}</li>
    <li><strong>Nombre:</strong> {{ $user->name }}</li>
    <li><strong>Email:</strong> {{ $user->email }}</li>
    <li><strong>Telefono:</strong>{{$user->phone}}</li>
    <li><strong>Rol:</strong> {{ $user->role }}</li>
</ul>


<a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Volver</a>
@endsection
