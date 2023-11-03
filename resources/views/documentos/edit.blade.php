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
                <form name="form" action="{{ route('documentos.update', $documento->id) }}" method="POST">
                @method('PUT')
                @csrf
                @error('codigo')
                    <div class="alert alert-danger">
                        Ya existe un documento con ese codigo
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="{{ $documento->nombre }}" required>
                </div>
                <!-- <div class="mb-3">
                    <label for="codigo">Codigo</label>
                    <input type="text" class="form-control" name="codigo" value="{{ $documento->codigo }}" required>
                </div> -->
                <div class="mb-3">
                    <label for="contenido">Contenido</label>
                    <textarea class="form-control" name="contenido" mb-3s="3" required>{{ $documento->contenido }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="tipo">Tipo</label>
                    <select class="form-select" name="tipo">
                        @foreach($tipos as $tipo)
                            @if($tipo->id == $documento->tipo_id)
                                <option value="{{ $tipo->id }}" selected>{{ $tipo->nombre }}</option>
                            @else
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                            @endif
                        @endforeach()
                    </select>
                </div>
                <div class="mb-3">
                    <label for="proceso">Proceso</label>
                    <select class="form-select" name="proceso">
                        @foreach($procesos as $proceso)
                            @if($proceso->id == $documento->proceso_id)
                                <option value="{{ $proceso->id }}" selected>{{ $proceso->nombre }}</option>
                            @else
                                <option value="{{ $proceso->id }}">{{ $proceso->nombre }}</option>
                            @endif
                        @endforeach()
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
