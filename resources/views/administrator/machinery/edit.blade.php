@extends('adminlte::page')
@section('title', 'editar maquinaria')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">editar maquinaria</h1>
        <a href="{{ route('machinery.content') }}" class="btn btn-sm btn-primary">ver maquinarias</a>
    </div>
@stop
@section('content')
    <form action="{{ route('machinery.update') }}" method="post" enctype="multipart/form-data" class="row">
        @csrf
        <input type="hidden" name="id" value="{{$element->id}}">
        <div class="form-group col-sm-12 col-md-10">
            <input type="text" name="content_1" class="form-control" value="{{$element->content_1}}" placeholder="Título">
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <input type="text" name="order" class="form-control" value="{{$element->order}}" placeholder="Orden ej AA BB">
        </div>
        <div class="form-group col-sm-12">
            <textarea name="content_2" class="ckeditor">{{$element->content_2}}</textarea>
        </div>
        @foreach ($element->images as $ci)
            <div class="form-group col-sm-12 col-md-4">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $ci->id]) }}"></button>
                    <img src="{{ asset($ci->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label class="mr-2">imagen</label><small>tamaño 924x693 px</small>
                <input type="file" name="images[]" class="form-control-file">
            </div>                    
        @endforeach
        @if ($numberOfImagesAllowed)
            @for ($i = 1; $i <= $numberOfImagesAllowed; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label class="mr-2">imagen</label><small>tamaño 924x693 px</small>
                    <input type="file" name="images[]" class="form-control-file" id="">
                </div>           
            @endfor
        @endif   
        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="content_3" class="form-control" value="{{$element->content_3}}" placeholder="Video 1">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="content_4" class="form-control" value="{{$element->content_4}}" placeholder="Video 2">
        </div>
        <div class="form-group col-sm-12 col-md-4">
            <input type="text" name="content_5" class="form-control" value="{{$element->content_5}}" placeholder="Video 3">
        </div>
        @if ($element->content_6)
            <div class="form-group col-sm-12 sw">
                <a href="{{ route('ficha-tecnica', ['id'=> $element->id]) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger far fa-trash-alt" id="borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $element->id]) }}">
                </button>
            </div>          
        @endif
        <div class="form-grou col-sm-12">
            <label for="">Ficha técnica</label>
            <input type="file" name="content_6" class="form-control-file">
        </div>
        <div class="text-right col-sm-12">
            <button type="submit" class="btn btn-sm btn-primary">Guardar</button>
        </div>
    </form>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script>
        let buttonsDestroyImgProduct = document.querySelectorAll('.destroyImgProduct')

        function modalDestroy(e)
        {
            e.preventDefault()

            Swal.fire({
                title: 'Deseas eliminar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Si!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    elementDestroy(this)
                }
            })
        }

        function elementDestroy(elemet)
        {
            axios.delete(elemet.dataset.url).then(r => {
                Swal.fire(
                    'Eliminado!',
                    '',
                    'success'
                )
            
                elemet.parentElement.remove()
            }).catch(error => console.error(error))

        }

        buttonsDestroyImgProduct.forEach(buttonDestroyImgProduct => {
            buttonDestroyImgProduct.addEventListener('click', modalDestroy)
        });

        // borrar ficha técnica
        let bf = document.getElementById('borrarFicha')
        if (bf) {
            bf.addEventListener('click', function(e){
                e.preventDefault()
                axios.delete(this.dataset.url)
                .then(r => {
                    this.closest('div').remove()
                })
                .catch(e => console.error( new Error(e) ))      
            })
        } 
    </script>
@stop

