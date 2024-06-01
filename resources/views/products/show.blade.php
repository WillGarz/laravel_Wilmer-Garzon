@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">{{ $product->name }}</h1>
        <p>Precio: ${{ $product->price }}</p>
        <p>Categoría: {{ $product->category->name }}</p>
        <p class="card-text"><strong>Descripción:</strong> {{ $product->description }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Regresar a Productos</a>
    </div>
@endsection
