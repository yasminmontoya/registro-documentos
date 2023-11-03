@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido, ') }} {{ Auth::user()->name }}
                    <br>
                    <a href="{{ route('documentos.index') }}" class="btn btn-primary btn-sm mt-2">Ir a documentos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
