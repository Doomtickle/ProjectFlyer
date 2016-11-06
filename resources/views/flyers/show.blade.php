@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h1>{{ $flyer->street }}</h1>
            <hr>
            <div class="description">
                Description: {{ $flyer->description }}
            </div>
            <div class="price">
                Price: ${{ number_format($flyer->price) }}
            </div>
        </div>
        <div class="col-md-9">
            @foreach($flyer->photos as $photo)
                <img class="img img-responsive" src="{{$photo->path}}" alt="">
            @endforeach
        </div>
    </div>
    <hr>
    <h2>Add your photos</h2>

    <form id="addPhotosForm" action="/{{ $flyer->zip }}/{{ $flyer->street }}/photos" method="POST" class="dropzone">
        {{ csrf_field() }}
    </form>
    <hr>
@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {

            paramName: 'photo',
            maxFileSize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        };
    </script>

@stop