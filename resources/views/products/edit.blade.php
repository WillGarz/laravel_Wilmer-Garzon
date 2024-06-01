@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Editar Producto </h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nombre:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Precio:</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}"
                    step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" name="description" rows="3">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría:</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
@endsection
