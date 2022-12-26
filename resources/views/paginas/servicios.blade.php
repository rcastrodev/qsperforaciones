@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-15 m-0">
                <li class="breadcrumb-item active fst-italic" aria-current="page" style="color: black;">Servicios</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row m-0">
    @foreach ($services as $k => $s)
        @if ($k%2==0)
            <div class="col-sm-12 col-md-6 text-white p-sm-4 p-md-5 ul-style font-size-14" style="background-color: {{$s->content_3}}">
                <div class="mb-3 d-flex align-items-center">
                    @if (Storage::disk('public')->exists($s->image))
                        <div class="me-3" style="padding: 10px 11px; border-radius: 100%; background-color: {{$s->content_6}}">
                            <img src="{{ asset($s->image) }}" alt="">
                        </div>
                    @endif
                    <h4 class="font-size-14 text-uppercase fw-bold m-0" style="color: {{ $s->content_4 }};">{{ $s->content_1 }}</h4>
                </div>
                <div style="color: {{ $s->content_5 }}; font-weight: 500;">{!! $s->content_2 !!}</div>
            </div>
            <img src="{{ asset($s->content_7) }}" class="col-sm-12 col-md-6 p-0 d-sm-none d-md-block">
        @else 
            <img src="{{ asset($s->content_7) }}" class="col-sm-12 col-md-6 p-0 d-sm-none d-md-block">  
            <div class="col-sm-12 col-md-6 text-white p-sm-4 p-md-5 ul-style font-size-14" style="background-color: {{$s->content_3}}">
                <div class="mb-3 d-flex align-items-center">
                    @if (Storage::disk('public')->exists($s->image))
                        <div class="me-3" style="padding: 10px 11px; border-radius: 100%; background-color: {{$s->content_6}}">
                            <img src="{{ asset($s->image) }}" alt="">
                        </div>
                    @endif
                    <h4 class="font-size-14 text-uppercase fw-bold m-0" style="color: {{ $s->content_4 }}">{{ $s->content_1 }}</h4>
                </div>
                <div style="color: {{ $s->content_5 }}; font-weight: 500;">{!! $s->content_2 !!}</div>
            </div>
        @endif
    @endforeach
</div>
@endsection
