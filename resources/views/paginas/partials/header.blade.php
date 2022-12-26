<header class="header bg-primary py-2 d-sm-none d-md-block" style="padding: 0 !important">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 d-flex align-items-center flex-wrap text-dark">
                @isset($data->phone1)
                    <div class="mb-xs-2 mb-md-0 me-sm-2 me-md-4">
                        <i class="fas fa-phone-alt text-white me-2"></i>  
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{$phone[0]}}" class="text-white">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{$data->phone1}}" class="text-white">{{ $data->phone1 }}</a>
                        @endif        
                    </div>                 
                @endisset
                @isset($data->email)
                <div class="me-sm-2 me-md-4">
                    <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white">
                        <i class="fas fa-envelope text-white me-2"></i> {{ $data->email }}
                    </a> 
                </div>
                @endisset
                @isset($data->phone2)
                    <i class="fab fa-whatsapp text-white me-2"></i> 
                    <div class="mb-xs-2 mb-md-0">
                        @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                        @if (count($phone2) == 2)
                            <a href="https://wa.me/{{$phone2[0]}}" class="text-white">{{$phone2[0]}}</a>
                        @else 
                            <a href="https://wa.me/{{$data->phone2}}" class="text-white">{{$data->phone2}}</a>
                        @endif
                    </div>          
                @endisset    
            </div>
            <div class="col-sm-12 col-md-4 d-flex justify-content-end align-items-center">
                <a href="{{ route('solicitar-presupuesto') }}" class="p-1 tex-white bg-black fw-bold py-2 px-4 text-uppercase me-2 font-size-17 @if(Request::is('solicitar-presupuesto')) solicitar-active @endif">solicitar presupuesto</a>
                <a href="{{$data->instagram}}" class="px-2" target="_blank"><i class="fab fa-instagram text-white"></i></a>
                <a href="{{$data->linkedin}}" class="px-2" target="_blank"><i class="fab fa-linkedin-in text-white"></i></a>
                <a href="{{$data->youtube}}" class="px-2" target="_blank"><i class="fab fa-youtube text-white"></i></a>
                <a href="{{$data->facebook}}" class="px-2" target="_blank"><i class="fab fa-facebook text-white"></i></a>
                <a href="{{$data->twitter}}" class="px-2" target="_blank"><i class="fab fa-twitter text-white"></i></a>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light fondo-azul-oscuro">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
            <ul class="navbar-nav text-uppercase font-size-14">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('/')) active @endif" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item @if(Request::is('quienes-somos')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('quienes-somos')) active @endif" href="{{ route('quienes-somos') }}">quienes s&oacute;mos</a>
                    
                </li>
                <li class="nav-item @if(Request::is('servicios')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('servicios')) active @endif" href="{{ route('servicios') }}">servicios</a>
                </li>
                <li class="nav-item @if(Request::is('maquinarias') || Request::is('maquinaria/*')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('maquinarias') || Request::is('maquinaria/*')) active @endif" href="{{ route('maquinarias') }}">maquinaria</a>
                </li>
                <li class="nav-item @if(Request::is('obras-realizadas') || Request::is('obra-realizada/*')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('obras-realizadas') || Request::is('obra-realizada/*')) active @endif" href="{{ route('obras-realizadas') }}" >obras realizadas</a>
                </li>
                <li class="nav-item @if(Request::is('clientes')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('clientes')) active @endif" href="{{ route('clientes') }}">clientes</a>
                </li>
                <li class="nav-item @if(Request::is('videos')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('videos')) active @endif" href="{{ route('videos') }}" >videos</a>
                </li>
                <li class="nav-item d-sm-block d-md-none @if(Request::is('solicitar-presupuesto')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('solicitar-presupuesto')) active @endif" href="{{ route('solicitar-presupuesto') }}">Solicitar Presupuesto</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link text-dark @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
