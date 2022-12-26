@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-15 m-0">
                <li class="breadcrumb-item active fst-italic" aria-current="page" style="color: black;">Solicitar Presupuesto</li>
            </ol>
        </nav>
    </div>
</div>
<section class="py-sm-2 py-md-5">
    <div class="container-form">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <span class="d-block">{{$error}}</span>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
        @endif
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
        @endif
        <form action="{{ route('send-quote') }}" method="post" enctype="multipart/form-data" class="row">
            @csrf
            <div class="col-sm-12 mb-3">
                <img src="{{ asset('images/s1.png') }}" class="d-block mx-auto img-fluid d-sm-none d-md-block">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-3">
                <input type="text" name="nombre" placeholder="Ingresar nombre *" class="form-control" style="padding: 12px;">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-3">
                <input type="email" name="email" placeholder="Ingrese su correo electrónico *" class="form-control" style="padding: 12px;">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-3">
                <input type="text" name="telefono" placeholder="Ingrese su teléfono *" class="form-control" style="padding: 12px;">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-3">
                <input type="text" name="trabajo" placeholder="Zona de trabajo" class="form-control" style="padding: 12px;">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-3">
                <select name="tipo_trabajo" class="form-control" style="padding: 12px;">
                    <option disabled selected>Tipo de trabajo</option>
                    <option value="Pilote">Pilote</option>
                    <option value="Micropilote">Micropilote</option>
                    <option value="Anclaje">Anclaje</option>
                    <option value="Estudio de suelo">Estudio de suelo</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-3">
                <input type="text" name="cantidad" placeholder="Cantidad" class="form-control" style="padding: 12px;">
            </div>
            <div class="form-group col-sm-12 col-md-6">
            </div>
            <div class="form-group col-sm-6 col-md-3 mb-3">
                <input type="number" name="diametro" placeholder="Diámetro (cm)" class="form-control" style="padding: 12px;">
            </div>
            <div class="form-group col-sm-6 col-md-3 mb-3">
                <input type="number" name="longitud" placeholder="Longitud (metro)" class="form-control" style="padding: 12px;">
            </div>
            <div class="form-group col-sm-12 mb-3">
                <textarea name="descripcion" placeholder="Descripción" class="form-control" cols="30" rows="3" style="padding: 12px;"></textarea>
            </div>
            <div class="col-sm-12 col-md-6 mb-sm-3 mb-md-5 position-relative">
                <div class="input-group mb-2 mr-sm-2">
                    <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="far fa-folder"></i></div>
                    </div>
                </div>
                <input type="file" name="file" class="form-control-file position-absolute" style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
            </div>
            <div class="col-sm-12 col-md-6 text-end">
                <button class="bg-primary text-primary py-2 px-4 text-white btn">Enviar <i class="fas fa-chevron-right ms-3"></i></button>
            </div>
        </form>
    </div>
</section>
@endsection
@push('head')
<style>
    @media (min-width: 992px){
        .container-form{
            width: 55% !important;
            margin: auto
        }
    }
    @media (max-width: 992px){
        .container-form{
            width: 95% !important;
            margin: auto
        }
    }
</style>
@endpush
