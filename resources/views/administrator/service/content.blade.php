@extends('adminlte::page')
@section('title', 'Servicios')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Servicios</h1>
        <a href="{{ route('service.create') }}" class="btn btn-sm btn-primary">crear</a>
    </div>
@stop
@section('content')
<div class="row mb-5">
    <div class="col-sm-12">
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@isset($section_1)
    <form action="{{ route('service.update') }}" method="post" class="row mt-5 mb-5" data-async="no" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section_1->id}}">
        <div class="col-sm-12">
            <div class="form-group">
                <textarea name="content_1" class="ckeditor" cols="30" rows="10">{{$section_1->content_1}}</textarea>
            </div>
        </div>
        <div class="text-right col-sm-12">
            <button type="submit" class="btn btn-primary update">Actualizar</button>
        </div>
    </form>   
@endisset
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('service.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/service/index.js') }}"></script>
@stop

