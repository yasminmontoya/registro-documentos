@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('documentos.index') }}" class="btn btn-primary btn-sm"><i class="bi bi-arrow-left"></i> Volver</a>
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
                        Ya existe un documento con ese codigo
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="mb-3">
                    <label for="contenido">Contenido</label>
                    <textarea class="form-control" name="contenido" value="{{ old('contenido') }}" rows="6" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="tipo">Tipo</label>
                    <select class="form-select" name="tipo" required>
                        <option selected disabled value="">Selecciona un tipo</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach()
                    </select>
                </div>
                <div class="mb-3">
                    <label for="proceso">Proceso</label>
                    <select class="form-select" name="proceso" required>
                        <option selected disabled value="">Selecciona un proceso</option>
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
