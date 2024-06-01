@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Regresar a Categorías</a>
    </div>
@endsection
