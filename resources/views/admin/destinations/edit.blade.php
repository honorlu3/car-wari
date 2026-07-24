@extends('layouts.admin')

@section('title','Editar Destino')

@section('content')

<h2>Editar Destino</h2>


{{-- FORMULARIO PRINCIPAL ACTUALIZAR --}}
<form 
    action="{{ route('admin.destinations.update', $destination) }}" 
    method="POST" 
    enctype="multipart/form-data">

    @csrf
    @method('PUT')


    <div class="mb-3">
        <label class="form-label">
            Nombre
        </label>

        <input 
            class="form-control" 
            name="name" 
            value="{{ old('name', $destination->name) }}" 
            required>
    </div>


    <div class="mb-3">

        <label class="form-label">
            Ubicación
        </label>

        <input 
            class="form-control" 
            name="location" 
            value="{{ old('location', $destination->location) }}">

    </div>


    <div class="mb-3">

        <label class="form-label">
            Precio
        </label>

        <input 
            class="form-control" 
            name="price" 
            value="{{ old('price', $destination->price) }}">

    </div>


    <div class="mb-3">

        <label class="form-label">
            Descripción
        </label>

        <textarea 
            class="form-control" 
            name="description" 
            rows="4">{{ old('description', $destination->description) }}</textarea>

    </div>



    {{-- IMAGEN PRINCIPAL --}}
    <div class="mb-3">

        <label class="form-label">
            Imagen principal
        </label>


        <input 
            type="file" 
            class="form-control" 
            name="image"
            accept="image/*">


        @if($destination->image)

            <div class="mt-3">

                <img
                    src="{{ asset('storage/'.$destination->image) }}"
                    alt="Imagen principal"
                    class="img-thumbnail"
                    style="max-width:200px;">

            </div>

        @endif


    </div>



    {{-- AGREGAR GALERIA --}}
    <hr>

    <h4>
        Agregar nuevas imágenes
    </h4>


    <div class="mb-3">


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



    <button 
        type="submit"
        class="btn btn-primary">

        Actualizar

    </button>


    <a 
        href="{{ route('admin.destinations.index') }}" 
        class="btn btn-secondary">

        Cancelar

    </a>


</form>



<hr>



{{-- IMAGEN PRINCIPAL ACTUAL --}}
@if($destination->image)


<h4>
    Imagen principal actual
</h4>


<form
    action="{{ route('admin.destinations.deleteImage',$destination) }}"
    method="POST"
    class="mb-4">

    @csrf
    @method('DELETE')


    <button
        type="submit"
        class="btn btn-danger btn-sm"
        onclick="return confirm('¿Eliminar imagen principal?')">

        Eliminar imagen principal

    </button>


</form>


@endif





{{-- GALERIA ACTUAL --}}

<h4>
    Galería de imágenes
</h4>


<div class="row">


@forelse($destination->images as $image)


    <div class="col-md-3 mb-3">


        <img
            src="{{ asset('storage/'.$image->image) }}"
            class="img-thumbnail"
            style="width:100%;height:150px;object-fit:cover;">



        <form
            action="{{ route('admin.destination-images.destroy',$image) }}"
            method="POST"
            class="mt-2">


            @csrf
            @method('DELETE')


            <button
                type="submit"
                class="btn btn-danger btn-sm w-100"
                onclick="return confirm('¿Eliminar esta imagen?')">

                Eliminar

            </button>


        </form>


    </div>


@empty


    <div class="col-12">

        <p class="text-muted">
            No hay imágenes en la galería.
        </p>

    </div>


@endforelse


</div>





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