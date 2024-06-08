@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
        @if ($category->image)
            <img src="{{ asset('images/categories/' . $category->image) }}" alt="{{ $category->name }}"
                class="img-thumbnail mb-3" style="width: 200px; height: auto;">
        @endif
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Regresar a Categorías</a>
    </div>
@endsection
