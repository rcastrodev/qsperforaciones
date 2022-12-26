@extends('paginas.partials.app')
@section('content')
@if ($sliders)
	@if (count($sliders))
		<div id="sliderHeroEmpresa" class="carousel slide" data-bs-interval	="3000" data-bs-ride="carousel">
			<div class="carousel-indicators">
				@foreach ($sliders as $k => $v)
					<button type="button" data-bs-target="#sliderHeroEmpresa" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner" >
				@foreach ($sliders as $k => $v)
					<div class="carousel-item @if(!$k) active @endif" style="background-image: linear-gradient(rgba(0, 0, 0, 0.9),rgba(0, 0, 0, 0.1)), url({{ asset($v->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					</div>			
				@endforeach
			</div>	
		</div>	
	@endif
@endif
@isset($section2)
	<section id="section_2" class="py-sm-3 py-md-5 mb-4">
		<div class="container py-sm-0 py-md-3">
			<div class="row">
				<div class="col-sm-12 col-md-6 mb-4 font-size-15">
					<h4 class="text-secundary mb-4 font-size-18">{{ $section2->content_1}}</h4>
					<div class="font-size-14" style="color: #27272B; font-weight: 500;">{!! $section2->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<img src="{{ asset($section2->image) }}" class="w-100 img-fluid" style="object-fit: cover;">
				</div>		
			</div>
		</div>
	</section>
@endisset
@if (isset($textService) or isset($services))
	@isset($services)
		@if (count($services))
		<section id="section_2" class="py-sm-4 py-md-5 px-4 bg-light">
			<div class="container-service">
				<div class="text-center mb-5" style="color: #27272B; font-weight: 500;">{!!$textService->content_1!!}</div>
				<div class="d-flex flex-sm-column flex-md-row flex-wrap justify-content-sm-start justify-content-md-between align-items-sm-start align-items-md-center text-sm-center text-md-start">
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
@endif
@endsection

