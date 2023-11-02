@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Documentos') }}</div>

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
                                <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
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
@endsection
