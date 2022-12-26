@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-15 m-0">
                <li class="breadcrumb-item active fst-italic" aria-current="page" style="color: black;">Clientes</li>
            </ol>
        </nav>
    </div>
</div>
<section class="py-sm-2 py-md-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-start">
            @foreach ($clients as $client)
                @if (Storage::disk('public')->exists($client->image))
                    <div class="contenedor-cliente col-sm-12 col-md-2 mb-4 d-flex justify-content-center align-items-center me-3 p-3" style="border: 1px solid #B6BEBB">
                        <img src="{{ asset($client->image) }}" class="img-fluid">
                    </div>   
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
