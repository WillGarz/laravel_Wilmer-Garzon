<!-- resources/views/products/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Crear Producto</h1>
    <div class="form-container">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Nombre Producto</label>
                <input type="text" class="form-control" id="productName" name="name" placeholder="Nombre Producto">
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Precio</label>
                <input type="number" class="form-control" id="productPrice" name="price" placeholder="Precio">
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Descripción</label>
                <textarea class="form-control" id="productDescription" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoría</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
@endsection
