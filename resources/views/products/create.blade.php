@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Crear Producto</h1>
        <div class="form-container">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="productName" class="form-label">Nombre Producto</label>
                    <input type="text" class="form-control" id="productName" name="name" placeholder="Nombre Producto"
                        required>
                </div>
                <div class="mb-3">
                    <label for="productPrice" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="productPrice" name="price" placeholder="Precio"
                        required>
                </div>
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Descripción</label>
                    <textarea class="form-control" id="productDescription" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoría</label>
                    <select class="form-control" id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
@endsection
