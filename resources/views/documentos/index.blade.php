@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Lista de documentos</span>
                    <a href="{{ route('documentos.create') }}" class="btn btn-primary btn-sm">Crear</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Proceso</th>
                                <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentos as $documento)
                                <tr>
                                    <th scope="row">{{ $documento->id }}</th>
                                    <td>{{ $documento->nombre }}</td>
                                    <td>{{ $documento->codigo }}</td>
                                    <td>{{ $documento->tipo_id }}</td>
                                    <td>{{ $documento->proceso_id }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('documentos.show', $documento->id)}} " class="btn btn-secondary btn-sm"><i class="bi bi-eye"></i></a>
                                            <a href="{{ route('documentos.edit', $documento->id)}} " class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este documento?')"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
