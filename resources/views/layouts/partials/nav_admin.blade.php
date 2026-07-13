<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/admin') }}">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navAdmin">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navAdmin">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/admin/users') }}">Usuarios</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.destinations.index') }}">Destinos</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.reservas.index') }}">Reservas</a></li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item nav-link text-white">Hola, {{ auth()->user()->name ?? '---' }}</li>
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-link nav-link" type="submit">Cerrar Sesión</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
