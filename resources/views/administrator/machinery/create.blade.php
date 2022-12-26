@extends('adminlte::page')
@section('title', 'Crear maquinaria')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear maquinaria</h1>
        <a href="{{ route('machinery.content') }}" class="btn btn-sm btn-primary">ver maquinarias</a>
    </div>
@stop
@section('content')
    <form action="{{ route('machinery.store') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <input type="hidden" name="section_id" value="7">
        <div class="form-group col-sm-12 col-md-10">
            <input type="text" name="content_1" class="form-control" value="{{ old('content_1') }}" placeholder="Título">
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <input type="text" name="order" class="form-control" value="{{ old('order') }}" placeholder="Orden ej AA BB">
        </div>
        <div class="form-group col-sm-12">
            <textarea name="content_2" class="ckeditor">{{ old('content_2') }}</textarea>
        </div>
        <div class="row">
            @for ($i = 1; $i <= 6; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image{{$i}}">imagen {{$i}} <small>tamño 924x693 px</small></label>
                    <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
                </div>           
            @endfor
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="content_3" class="form-control" value="{{ old('content_3') }}" placeholder="Video 1">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="content_4" class="form-control" value="{{ old('content_4') }}" placeholder="Video 2">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="content_5" class="form-control" value="{{ old('content_5') }}" placeholder="Video 3">
        </div>
        <div class="form-grou col-sm-12">
            <label for="">Ficha técnica</label>
            <input type="file" name="content_6" class="form-control-file">
        </div>
        <div class="text-right col-sm-12">
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

