<div class="card producto">
    <div class="position-relative">  
        <a href="{{ route('obra-realizada', ['id' => $element->id]) }}" class="mas position-absolute text-decoration-none text-white" style="font: normal normal 300 55px/66px Lato;"></a>
        @if (count($element->images))
            @if (Storage::disk('public')->url($element->images()->first()->image))
                <img src="{{ asset($element->images()->first()->image) }}" class="img-fluid image-card" width="394" height="346" style="min-height: 375px; max-height:345px;">
            @else
                <img src="{{ asset('images/default.jpg') }}" class="img-fluid image-card" width="394" height="346" style="min-height: 375px; max-height:345px;">
            @endif
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid image-card" width="394" height="346" style="min-height: 375px; max-height:345px;">
        @endif
    </div>
    <div class="card-body px-0">
        <p class="card-text">
            <a href="{{ route('obra-realizada', ['id' => $element->id]) }}" class="text-decoration-none text-dark font-size-14 text-uppercase d-block fw-bold">{{$element->content_1}}</a>
        </p>
    </div>
</div>


