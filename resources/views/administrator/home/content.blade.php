@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Imagen</th>
                    <th>Pre título</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section2)
    <form action="{{ route('home.update1') }}" method="post" class="row mb-2" enctype="multipart/form-data" data-async="no">
        @csrf
        <input type="hidden" name="id" value="{{$section2->id}}">
        <div class="col-sm-12 mb-2">
            <div class="form-group m-0">
                <input type="text" name="content_1" value="{{$section2->content_1}}" class="form-control">
            </div>
        </div>
        <div class="col-sm-12 mb-2">
            <div class="form-group m-0">
                <textarea name="content_2" class="ckeditor" cols="30" rows="10">{{$section2->content_2}}</textarea>
            </div>
        </div>
        @if (Storage::disk('public')->url($section2->image))
            <img src="{{ asset($section2->image) }}" width="300" height="150" style="object-fit: cover;">
        @endif
        <div class="col-sm-12 mb-2">
        </div>
        <div class="col-sm-12 mb-2">
            <small>tamaño recomendable 1366x263px</small>
            <div class="form-group m-0">
                <input type="file" name="image" class="form-control-file">
            </div>
        </div> 
        <div class="text-right col-sm-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>  
@endisset

@includeIf('administrator.home.modals.create-slider')
@includeIf('administrator.home.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

