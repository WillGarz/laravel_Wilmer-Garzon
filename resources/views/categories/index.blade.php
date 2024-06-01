<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Categorías</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear Nueva Categoría</a>
        <ul class="list-group mt-3">
            @foreach ($categories as $category)
                <li class="list-group-item">
                    {{ $category->name }} -
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
