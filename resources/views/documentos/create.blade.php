@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Crear Documento</span>
                    <a href="{{ route('documentos.index') }}" class="btn btn-primary btn-sm">Volver</a>
                </div>
                <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
                @endif
                <form name="form" action="{{ route('documentos.store') }}" method="POST">
                @csrf
                @error('codigo')
                    <div class="alert alert-danger">
                        Ya existe un documento con ese codigo!
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="mb-3">
                    <label for="codigo">Codigo</label>
                    <input type="text" class="form-control" name="codigo" value="{{ old('codigo') }}" required>
                </div>
                <div class="mb-3">
                    <label for="contenido">Contenido</label>
                    <textarea class="form-control" name="contenido" value="{{ old('contenido') }}" mb-3s="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="tipo">Tipo</label>
                    <select class="form-select" name="tipo">
                        <option selected>Selecciona un tipo</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach()
                    </select>
                </div>
                <div class="mb-3">
                    <label for="proceso">Proceso</label>
                    <select class="form-select" name="proceso">
                        <option selected>Selecciona un proceso</option>
                        @foreach($procesos as $proceso)
                            <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
                        @endforeach()
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
