@extends('adminlte::page')
@section('title', 'Crear servicio')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear servicio</h1>
        <a href="{{ route('service.content') }}" class="btn btn-sm btn-primary">ver servicios</a>
    </div>
@stop
@section('content')

    <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section_id" value="6">
        <div class="form-group">
            <input type="text" name="content_1" class="form-control" value="{{ old('content_1') }}" placeholder="Título">
        </div>
        <div class="form-group">
            <textarea name="content_2" class="ckeditor">{{ old('content_2') }}</textarea>
        </div>
        <div class="row mb-2">
            <div class="form-group col-sm-12 col-md-3">
                <label for="">Color de fondo</label>
                <input type="color" name="content_3" value="{{ old('content_3') }}" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-3">
                <label for="">Color del título</label>
                <input type="color" name="content_4" value="{{ old('content_4') }}" class="form-control" value="{{ old('order') }}">
            </div>
            <div class="form-group col-sm-12 col-md-3">
                <label for="">Color del texto</label>
                <input type="color" name="content_5" value="{{ old('content_5') }}" class="form-control" value="{{ old('order') }}">
            </div>
            <div class="form-group col-sm-12 col-md-3">
                <label for="">Color fondo de icono</label>
                <input type="color" name="content_6" value="{{ old('content_6') }}" class="form-control">
            </div>
        </div>
        <div class="row mb-2">
            <div class="form-group col-sm-12 col-md-4">
                <label for="">Orden</label>
                <input type="text" name="order" class="form-control" value="{{ old('order') }}">
            </div>
            <div class="form-grou col-sm-12 col-md-4">
                <label for="">Imagen <small>Icono 683x284px</small></label>
                <input type="file" name="content_7" class="form-control-file">
            </div>
            <div class="form-grou col-sm-12 col-md-4">
                <label for="">Icono <small>Icono 27x27px</small></label>
                <input type="file" name="image" class="form-control-file">
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
@stop

