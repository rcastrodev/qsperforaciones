<footer class="py-sm-2 py-md-5 font-size-14 text-sm-center text-md-start bg-black">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-3 d-sm-none d-md-flex" style="display: flex; flex-direction: column; justify-content: space-between;">
                @if (Storage::disk('public')->exists($data->logo_footer))
                    <img src="{{ asset($data->logo_footer) }}" width="375" height="54" class="img-fluid" style="object-fit: cover">
                @endif
                <div class="d-flex">
                    <a href="{{$data->instagram}}" class="fab fa-instagram text-white me-3 text-decoration-none" target="_blank" style="padding: 8px 10px; border-radius: 100%; border: 2px solid white;"></a>
                    <a href="{{$data->linkedin}}" class="fab fa-linkedin-in text-white me-3 text-decoration-none" target="_blank" style="padding: 8px 10px; border-radius: 100%; border: 2px solid white;"></a>
                    <a href="{{$data->youtube}}" class="fab fa-youtube text-white me-3 text-decoration-none" target="_blank" style="padding: 8px 10px; border-radius: 100%; border: 2px solid white;"></a>
                    <a href="{{$data->facebook}}" class="fab fa-facebook text-white me-3 text-decoration-none" target="_blank" style="padding: 8px 10px; border-radius: 100%; border: 2px solid white;"></a>
                    <a href="{{$data->twitter}}" class="fab fa-twitter text-white me-3 text-decoration-none" target="_blank" style="padding: 8px 10px; border-radius: 100%; border: 2px solid white;"></a>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 mb-sm-4 mb-md-0">
                <div class="row justify-content-between">
                    <div class="col-sm-12 position-relative">
                        <h6 class="text-uppercase text-primary fw-bold mb-4 border-footer">secciones</h6>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('index') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">home</a>
                        <a href="{{ route('quienes-somos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">quienes s&oacute;mos</a>
                        <a href="{{ route('servicios') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">servicios</a>
                        <a href="{{ route('maquinarias') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">maquinaria</a>
                        <a href="{{ route('obras-realizadas') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">obras realizadas</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('clientes') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">clientes</a>
                        <a href="{{ route('videos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">videos</a>
                        <a href="{{ route('solicitar-presupuesto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">solicitar presupuesto</a>
                        <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">Contacto</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 font-size-13 mb-sm-4 mb-md-0">
                <div class="position-relative" style="padding: 1px;">
                    <h6 class="text-uppercase text-primary fw-bold mb-4 border-footer">qs perforaciones</h6>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="d-flex mb-3">
                            <i class="fas fa-map-marker-alt color-primario d-block me-2 mb-3 text-primary font-size-23"></i>
                            <address class="d-block text-light m-0"> {{ $data->address }}</address>
                        </div>
                        <div class="d-flex">
                            <i class="fas fa-envelope d-block me-2 mb-3 text-primary font-size-23"></i><span class="d-block"></span>
                            <a href="mailto:{{ $data->email }}" class="text-light text-underline">{{ $data->email }}</a>             
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        @isset($data->phone1)
                            @php $phone = Str::of($data->phone1)->explode('|') @endphp
                            <div class="d-flex mb-3">    
                                <i class="fas fa-phone-alt color-primario me-2 mb-3 text-primary font-size-23"></i>  
                                @if (count($phone) == 2)   
                                    <a href="tel:{{$phone[0]}}" class="text-light text-underline">{{ $phone[1] }}</a>                         
                                @else
                                    <a href="tel:{{$data->phone1}}" class="text-light text-underline">(011) {{ $data->phone1 }}</a>       
                                @endif
                            </div>
                        @endisset
                        @isset($data->phone2)
                            @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                            <div class="d-flex">
                                @if (count($phone2) == 2)
                                    <a href="https://wa.me/{{$phone2[0]}}" class="text-light text-underline">
                                        <i class="fab fa-whatsapp color-primario me-2 mb-3 text-primary font-size-23" style="color: #00bb2d !important; "></i> <span>{{$phone2[1]}}</span>
                                    </a>             
                                @else
                                    <a href="https://wa.me/{{$data->phone2}}" class="text-light text-underline">
                                        <i class="fab fa-whatsapp color-primario me-2 mb-3 text-primary font-size-23" style="color: #00bb2d !important;"></i> <span>{{$data->phone2}}</span>
                                    </a>            
                                @endif
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>