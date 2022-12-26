@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-15 m-0">
                <li class="breadcrumb-item active fst-italic" aria-current="page" style="color: black;">Videos</li>
            </ol>
        </nav>
    </div>
</div>
<section class="py-sm-2 py-md-5">
    <div class="container">
        <div class="row">
            @foreach ($videos as $video)
                <div class="col-sm-12 col-md-4 mb-4">
                    <div class="card producto iframe">
                        <div class="position-relative" style="height: 300px;">  
                            {!! $video->content_2 !!}
                        </div>
                        <div class="card-body px-0">
                            <p class="card-text text-dark fw-bold font-size-16">{{$video->content_1}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
