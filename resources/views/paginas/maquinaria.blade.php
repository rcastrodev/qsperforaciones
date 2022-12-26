@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-15 m-0">
                <li class="breadcrumb-item fst-italic" aria-current="page" style="color: black;">
					<a href="{{ route('index') }}" style="color: black;"><i class="fas fa-home"></i></a>
				</li>
                <li class="breadcrumb-item fst-italic" aria-current="page" style="color: black;">
                    <a href="{{ route('maquinarias') }}" class="text-decoration-none" style="color: black;">Maquinarias</a>
                </li>
                <li class="breadcrumb-item active fst-italic" aria-current="page" style="color: black;">{{ $mach->content_1 }}</li>
            </ol>
        </nav>
    </div>
</div>
<section class="py-sm-2 py-md-5">
    <div class="container">
        <div class="row">
            <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                <ul class="p-0" style="list-style: none;">
                    @foreach ($machinery as $m)
                        <li class="py-2  @if($m->id == $mach->id) active @endif"> 
                            <a href="{{ route('maquinaria', ['id'=> $m->id]) }}" class="toggle d-block p-2 text-decoration-none  text-decoration-none text-dark">{{$m->content_1}}</a>
                        </li>               
                    @endforeach                      
                </ul>             
            </aside>
            <div class="col-sm-12 col-md-9">
                <div class="mb-4">
                    @if (count($mach->images))
                        @if (Storage::disk('public')->url($mach->images()->first()->image))
                            <img src="{{ asset($mach->images()->first()->image) }}" class="img-fluid w-100" id="imgcurrent">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100" id="imgcurrent">
                        @endif  
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="img-fluid w-100" id="imgcurrent">
                    @endif
                </div>
                @if (count($mach->images))
                    <div class="py-sm-4 py-md-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 client-corrusel">
                                    @foreach ($mach->images as $m)
                                        <div class="content-img-carrusel-post">
                                            <img src="{{ asset($m->image) }}" class="img-fluid img-obra-carrusel" style="object-fit: contain;">
                                        </div> 
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>	
                @endif
                <div class="mb-sm-2 mb-md-5">
                    <h3 class="text-primary mb-3 font-size-17 fw-bold"> {{ $mach->content_1 }}</h3>
                    <div class="font-size-14">{!! $mach->content_2 !!}</div>
                </div>
                <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap mb-sm-2 mb-md-5">
                    @if($mach->content_6)
                        <a href="{{ route('ficha-tecnica', ['id'=> $mach->id]) }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 px-3  btn ficha-tecnica rounded-pill font-size-15 w-sm-100 w-md-50 position-relative text-center" style="width: 270px;">
                            <span class="text-uppercase fw-bold">ficha técnica</span>
                            <i class="fas fa-download position-absolute" style="right: 20px; top: 10px;"></i>
                        </a>  
                    @endif
                    <a href="{{ route('contacto') }}" class="btn bg-primary text-white fw-bold py-2 px-5 text-uppercase rounded-pill font-size-15 w-sm-100 w-md-50">solicitar presupuesto</a>
                </div>
                <div class="iframe">
                    @if($mach->content_3)
                        <div class="mb-3" style="height: 350px">
                            {!! $mach->content_3 !!}
                        </div>        
                    @endif
                    @if($mach->content_4)
                        <div class="mb-3" style="height: 350px">
                            {!! $mach->content_4 !!}
                        </div>        
                    @endif
                    @if($mach->content_5)
                        <div class="mb-3" style="height: 350px">
                            {!! $mach->content_5 !!}
                        </div>        
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
    <style>
        .client-corrusel img{
            cursor: pointer;
        }
    </style>
@endpush
@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/slick/slick.js') }}"></script>
	<script>
	$(document).ready(function(){
		$('.client-corrusel').slick({
			dots: true,
			infinite: true,
			speed: 100000,
			autoplay: true,
  			autoplaySpeed: 2000,
			slidesToShow: 4,
			slidesToScroll: 2,
			responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 2,
					infinite: true,
					dots: true
				}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
                    dots: false
				}
				},
				{
				breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                    }
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});
	})

    let imgCurrent = document.getElementById('imgcurrent')

    $('.client-corrusel img').click(function(e){
        imgCurrent.setAttribute('src', e.target.getAttribute('src'))
    })
	</script>
@endpush
