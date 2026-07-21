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
    <label class="form-label">Imagen principal</label>
    <input 
        class="form-control" 
        type="file" 
        id="image" 
        name="image" 
        accept="image/*">
</div>


<div class="mb-3">

    <label class="form-label">
        Galería de imágenes
    </label>


    <div id="gallery-container">

        <div class="input-group mb-2">

            <input 
                class="form-control"
                type="file"
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
        class="btn btn-primary"
        id="add-image">

        + Agregar otra imagen

    </button>


</div>

    <button class="btn btn-success">Guardar</button>
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
            class="form-control"
            type="file"
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



document.addEventListener(
'click',
function(e){


    if(e.target.classList.contains('remove-image')){


        e.target.parentElement.remove();


    }


});

</script>
@endsection
