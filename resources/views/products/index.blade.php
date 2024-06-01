<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Nuevo Producto</a>
    <ul class="list-group mt-3">
        @foreach($products as $product)
            <li class="list-group-item">
                {{ $product->name }} -
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
