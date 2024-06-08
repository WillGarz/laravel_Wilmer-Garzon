@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Categorías</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Crear Nueva Categoría</a>
        <ul class="list-group mt-3">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        @if($category->image)
                            <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 15px;">
                        @endif
                        {{ $category->name }}
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
