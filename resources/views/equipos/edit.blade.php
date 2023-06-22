@extends('layouts.app-master')
@section('content')
    <div class="card mt-4">
        <div class="card-header d-inline-flex">
            <h1>Formulario - Asignar Usuario</h1>
        </div>
        <div class="card-header d-inline-flex">
            <a href="{{ route('equipos.show', $diagrama->id) }}" class="btn btn-primary ml-auto">
                <i class="fas fa-arrow-left"></i>
                Volver</a>
        </div>
        <div class="card-body">
            <form action="{{route('equipos.update', $diagrama->id)}}" method="POST" enctype="multipart/form-data" id="update">
                @method('PUT')
                @include('equipos.partials.form')
            </form>
        </div>
        <div class="card-footer">
            <Button class="btn btn-primary" form="update">
                <i class="fas fa-pencil-alt"></i> Asignar
            </Button>
        </div>
    </div>
@endsection
