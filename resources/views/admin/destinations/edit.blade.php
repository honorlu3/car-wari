@extends('layouts.admin')

@section('title','Editar Destino')

@section('content')
<h2>Editar Destino</h2>

<form action="{{ route('admin.destinations.update', $destination) }}" method="POST" enctype="multipart/form-data">
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

    <div class="mb-3">
        <label class="form-label">Imagen</label>
        <input type="file" class="form-control" name="image">
        @if($destination->image)
            <img src="{{ asset('storage/' . $destination->image) }}" alt="Imagen del destino" class="img-thumbnail mt-2" style="max-width: 200px;">
        @endif  

    </div>
    <hr>

<h4>Galería de imágenes</h4>


<div class="row">

    @forelse($destination->images as $image)

        <div class="col-md-3 mb-3">

    <img 
    src="{{ asset('storage/' . $image->image) }}"
    class="img-thumbnail"
    style="width:100%;height:150px;object-fit:cover;">


    <form 
    action="{{ route('admin.destination-images.destroy',$image) }}"
    method="POST"
    class="mt-2">


        @csrf

        @method('DELETE')


        <button 
        class="btn btn-danger btn-sm w-100"
        onclick="return confirm('¿Eliminar esta imagen?')">

            Eliminar

        </button>


    </form>


</div>


    @empty

        <p class="text-muted">
            No hay imágenes en la galería.
        </p>

    @endforelse

</div>


<hr>


<div class="mb-3">

    <label class="form-label">
        Agregar nuevas imágenes
    </label>


    <div id="gallery-container">


        <div class="input-group mb-2">

            <input 
            type="file"
            class="form-control"
            name="images[]"
            accept="image/*">


            <button 
            type="button"
            class="btn btn-danger remove-image">
                X
            </button>


        </div>


    </div>


    <button 
    type="button"
    class="btn btn-success"
    id="add-image">

        + Agregar otra imagen

    </button>


</div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('admin.destinations.index') }}" class="btn btn-secondary">Cancelar</a>
</form>


<script>

document.getElementById('add-image')
.addEventListener('click', function(){


    let container = document.getElementById('gallery-container');


    let div = document.createElement('div');


    div.classList.add(
        'input-group',
        'mb-2'
    );


    div.innerHTML = `

        <input 
        type="file"
        class="form-control"
        name="images[]"
        accept="image/*">


        <button 
        type="button"
        class="btn btn-danger remove-image">
            X
        </button>

    `;


    container.appendChild(div);


});



document.addEventListener('click', function(e){


    if(e.target.classList.contains('remove-image')){


        e.target.parentElement.remove();


    }


});

</script>

@endsection
