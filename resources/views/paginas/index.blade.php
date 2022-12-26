@extends('paginas.partials.app')
@section('content')
@if(count($sliders))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($sliders as $k => $item)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner">
			@foreach ($sliders as $key => $slider)
				<div class="carousel-item @if(!$key) active @endif" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.1)), url({{ asset($slider->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					<div class="carousel-caption text-start">
						<h2 class="text-uppercase text-white font-size-49 fw-bold">{{ $slider->content_1 }}</h1>
						<h2 class="text-uppercase font-size-49 fw-bold" style="color: #F15A24">{{ $slider->content_2 }}</p>
					</div>
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@isset($services)
	@if (count($services))
	<section id="section_2" class="py-sm-4 py-md-5 px-4 bg-light" style="overflow-x: hidden">
		<div class="container-service fw-bold">
			<div class="d-flex flex-sm-column flex-md-row flex-wrap justify-content-sm-start justify-content-md-center align-items-sm-start align-items-md-center text-sm-center text-md-start">
				@foreach ($services as $service)
					<div class="d-flex align-items-center mb-sm-1 mb-md-0 me-4">
						<div class="bg-primary me-3" style="padding: 10px 11px; border-radius: 100%;">
							@if (Storage::disk('public')->exists($service->image))
								<img src="{{ asset($service->image) }}" width="28" height="28">
							@endif
						</div>
						<h6 class="d-block text-dark mb-1 font-size-14 mb-0 fw-bold">{{ $service->content_1 }}</h6>
					</div>				
				@endforeach
			</div>
		</div>
	</section>		
	@endif
@endisset
@isset($machinery)
	@if (count($machinery))
		<section id="section_3" class="py-sm-4 py-md-5">
			<div class="container">
				<div class="row">
					<h2 class="col-sm-12 mb-5 text-uppercase text-center text-primary font-size-17 fw-bold">conocé nuestra maquinaria</h2>
					@foreach ($machinery as $m)
						<div class="col-sm-12 col-md-4">
							@includeIf('paginas.partials.machinery', ['element' => $m])
						</div>					
					@endforeach
				</div>
			</div>
		</section>	
	@endif	
@endisset
@isset($section2)
	<section id="section2" class="d-flex align-items-center py-sm-2 py-md-5 text-white" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.1)), url({{$section2->image}}); background-size: 100% 100%; min-height: 288px;">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-5 text-sm-center text-md-end pe-sm-0 pe-md-5" style="border-right: 4px solid white;">
					<h3 class="mb-sm-2 mb-md-5 font-size-25">{!!$section2->content_1!!}</h3>
					<a href="{{ route('contacto') }}" class="text-uppercase bg-blue text-white btn bg-blue px-4 mb-sm-2 mb-md-0 bg-primary font-size-12" style="border-radius: 0px;">conocenos <i class="fas fa-arrow-right ms-2"></i></a>
				</div>
				<div class="col-sm-12 col-md-5 text-white ps-sm-0 ps-md-5 text-sm-center text-md-start font-size-14">{!!$section2->content_2!!}</div>
			</div>
		</div>
	</section>
@endisset
@isset($worksMade)
	@if (count($worksMade))
		<section id="section_3" class="py-sm-4 py-md-5">
			<div class="container">
				<div class="row">
					<h2 class="col-sm-12 mb-5 text-uppercase text-center text-primary font-size-17 fw-bold">Nuestras obras</h2>
					@foreach ($worksMade as $p)
						<div class="col-sm-12 col-md-6">
							@includeIf('paginas.partials.work-made', ['element' => $p])
						</div>					
					@endforeach
					<div class="col-sm-12 text-center mt-5">
						<a href="{{ route('obras-realizadas') }}" class="bg-primary py-2 px-4 fw-bold text-decoration-none text-white" style="    border-radius: 20px;">ver más</a>
					</div>
				</div>
			</div>
		</section>	
	@endif	
@endisset
@isset($clients)
	@if (count($clients))
		<section id="section_6" class="py-sm-4 py-md-5 bg-light">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 client-corrusel">
						@foreach ($clients as $c)
							<div class="content-img-carrusel">
								<img src="{{ asset($c->image) }}" alt="{{$c->name}}" class="img-fluid" style="object-fit: contain;">
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>	
	@endif	
@endisset

@endsection
@push('head')
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/slick/slick-theme.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendor/slick/slick.js') }}"></script>
	<script>
	$(document).ready(function(){
		$('.client-corrusel').slick({
			dots: true,
			infinite: true,
			speed: 1000,
			autoplay: true,
  			autoplaySpeed: 2000,
			slidesToShow: 6,
			slidesToScroll: 4,
			responsive: [
				{
				breakpoint: 1024,
				settings: {
					slidesToShow: 6,
					slidesToScroll: 4,
					infinite: true,
					dots: true
				}
				},
				{
				breakpoint: 600,
				settings: {
					slidesToShow: 5,
					slidesToScroll: 5
				}
				},
				{
				breakpoint: 480,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4
				}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});
	})
	</script>
@endpush
