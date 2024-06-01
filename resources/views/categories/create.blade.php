@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Crear Categoría</h1>
        <div class="form-container">
            <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descripción:</label>
                    <input type="text" id="description" name="description" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    @endsection
