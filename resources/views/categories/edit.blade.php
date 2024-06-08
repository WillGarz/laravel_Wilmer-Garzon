@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Editar Categoría</h1>
        <div class="form-container">
            <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <input type="text" id="description" name="description" class="form-control" value="{{ $category->description }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@endsection
