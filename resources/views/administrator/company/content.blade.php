@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
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
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-async="no" enctype="multipart/form-data">
    @csrf
    <h4 class="col-sm-12 mb-4">Contenido de empresa</h4>
    <input type="hidden" name="id" value="{{$section_2->id}}">
    <div class="col-sm-12 col-md-2">
        <label for="">Título</label>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <input type="text" name="content_1" value="{{$section_2->content_1}}" class="form-control">
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <textarea name="content_2" id="content_2" class="form-control ckeditor" cols="30" rows="4">{{$section_2->content_2}}</textarea>
        </div>
    </div>
    @if (Storage::disk('public')->url($section_2->image))
        <div class="col-sm-12">
            <img src="{{ asset($section_2->image) }}" alt="" width="400" height="220" style="object-fit: cover;">
        </div>
    @endif
    <div class="col-sm-12">
        <div class="form-group">
            <small>tamaño recomendado 606x433 px</small>
            <input type="file" name="image" class="form-control-file">
        </div>
    </div>
    <div class="text-right col-sm-12">
        <button type="submit" class="btn btn-primary update">Actualizar</button>
    </div>
</form>
@includeIf('administrator.company.modals.create-slider')
@includeIf('administrator.company.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

