@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Editar Categoría</h1>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción:</label>
                <input type="text" id="description" name="description" class="form-control"
                    value="{{ $category->description }}">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
@endsection
