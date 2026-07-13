<div class="container">
    <h1 class="section-title">Lista de Destinos</h1>
    
    <div class="destinations-grid">
        @foreach ($destinations as $destino)
            <div class="destination-card">
                <div class="card-image">
                    @if($destino->image)
                        <img src="{{ asset('storage/'.$destino->image) }}" alt="{{ $destino->name }}">
                    @else
                        <img src="https://aprendiendomatematicas.com/wp-content/uploads/2012/05/paisaje-300x200.jpg" alt="{{ $destino->name }}">              
                    @endif
                    
                    {{-- Badge de categoría - ajusta según tu modelo --}}
                    @if($destino->category)
                        <span class="category-badge">{{ $destino->category }}</span>
                    @else
                        <span class="category-badge">Turismo</span>
                    @endif
                </div>
                
                <div class="card-content">
                    <h3 class="card-title">{{ $destino->name }}</h3>
                    <p class="card-description">{{ Str::limit($destino->description, 100) }}</p>
                    
                    <div class="card-footer">
                        <div class="duration">
                            <i class="bi bi-clock"></i>
                            <span>{{ $destino->duration ?? 'Full day' }}</span>
                        </div>
                        <div class="price">
                            Desde S/ {{ $destino->price }}
                        </div>
                    </div>
                    
                    <div class="card-actions">
                        <a href="{{ route('reservas.create', ['destino_id' => $destino->id]) }}" class="btn-reservar-card">
                            Reservar
                        </a>
                        <a href="{{ route('destinations.show', $destino) }}" class="btn-ver-mas">
                            Ver más
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>