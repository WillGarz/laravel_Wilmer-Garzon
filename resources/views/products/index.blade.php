@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Nuevo Producto</a>
    <ul class="list-group mt-3">
        @foreach($products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    @if($product->image)
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 15px;">
                    @endif
                    {{ $product->name }}
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
