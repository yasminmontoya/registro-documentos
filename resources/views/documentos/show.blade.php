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
                    <div class="mb-3">
                        <label class="fw-bold">Nombre: </label>
                        <p>{{ $documento->nombre }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Codigo: </label>
                        <p>{{ $documento->codigo }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Contenido: </label>
                        <p>{{ $documento->contenido }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Tipo: </label>
                        <p>
                            @foreach($tipos as $tipo)
                                @if($tipo->id == $documento->tipo_id)
                                {{ $tipo->nombre }}
                                @endif
                            @endforeach()
                        </p>
                    </div>
                    <div class="">
                        <label class="fw-bold">Proceso: </label>
                        <p>
                            @foreach($procesos as $proceso)
                                @if($proceso->id == $documento->proceso_id)
                                    {{ $proceso->nombre }}
                                @endif
                            @endforeach()
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
