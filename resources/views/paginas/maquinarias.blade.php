@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-15 m-0">
                <li class="breadcrumb-item fst-italic" aria-current="page" style="color: black;">
					<a href="{{ route('index') }}" style="color: black;"><i class="fas fa-home"></i></a>
				</li>
                <li class="breadcrumb-item active fst-italic" aria-current="page" style="color: black;">Maquinaria</li>
            </ol>
        </nav>
    </div>
</div>
@isset($machinery)
	@if (count($machinery))
		<section id="section_3" class="py-sm-4 py-md-5">
			<div class="container">
				<div class="row">
					<h2 class="col-sm-12 mb-5 text-uppercase text-center text-primary font-size-17 fw-bold">conocé nuestra maquinaria</h2>
					@foreach ($machinery as $m)
						<div class="col-sm-12 col-md-3">
							@includeIf('paginas.partials.machinery', ['element' => $m])
						</div>					
					@endforeach
				</div>
			</div>
		</section>	
	@endif	
@endisset
@endsection