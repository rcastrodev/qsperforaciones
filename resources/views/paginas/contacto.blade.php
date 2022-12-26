@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-15 m-0">
                <li class="breadcrumb-item active fst-italic" aria-current="page" style="color: black;">Contacto</li>
            </ol>
        </nav>
    </div>
</div>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d819.8715323639132!2d-58.34440827077723!3d-34.71813889877688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDQzJzA1LjMiUyA1OMKwMjAnMzcuOSJX!5e0!3m2!1ses!2sve!4v1632506846920!5m2!1ses!2sve" height="428" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
    <div class="container">
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
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 mb-sm-2 mb-md-4">
                    <h2 class="text-primary fw-bold font-size-18 text-uppercase">qs perforaciones</h2>
                </div>
                <div class="col-sm-12 col-md-4 font-size-13">
                    <div class="d-flex mb-3 align-items-center">
                        <i class="fas fa-map-marker-alt text-primary font-size-23 d-block me-2"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex mb-3 align-items-center">
                        <i class="fas fa-phone-alt font-size-23 text-primary me-2"></i>  
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a style="color: #212529;" href="tel:{{$phone[0]}}" class="text-decoration-none">{{ $phone[1]}}</a>
                        @else
                            <a style="color: #212529;" href="tel:{{$data->phone1}}" class=" text-decoration-none">{{ $data->phone1}}</a>
                        @endif
                    </div>
                    <div class="d-flex mb-3 align-items-center">
                        @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="https://wa.me/{{$phone2[0]}}" class="text-light text-decoration-none">
                                <i class="fab fa-whatsapp font-size-23 text-primary me-2"></i> 
                                <span style="color: #212529;">{{$phone2[1]}}</span>
                            </a>   
                        @else
                            <a href="https://wa.me/{{$phone2}}" class="text-decoration-none">
                                <i class="fab fa-whatsapp text-primary me-2 font-size-23"></i> 
                                <span style="color: #212529;">{{$phone2}}</span>
                            </a>   
                        @endif
                    </div>
                    <div class="d-flex mb-3 align-items-center">
                        <i class="far fa-envelope font-size-23 text-primary d-block me-2"></i><span class="d-block">{{ $data->email }}</span>                        
                    </div>
                    <div class="">
                        <p>Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</p>
                    </div>
                </div>          
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre" class="form-control font-size-14" style="padding: 12px;">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <input type="text" name="apellido" placeholder="Apellido" class="form-control font-size-14" style="padding: 12px;">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Correo electrónico" class="form-control font-size-14" style="padding: 12px;">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <input type="text" name="telefono" placeholder="Teléfono" class="form-control font-size-14" style="padding: 12px;">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <textarea name="mensaje" placeholder="Escriba un mensaje" class="form-control font-size-14" cols="30" rows="5" style="padding: 12px;"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                            <button type="submit" class="text-uppercase btn text-white bg-primary font-size-13 py-2 px-5 mb-sm-3 mb-md-0 ancho-boton">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
