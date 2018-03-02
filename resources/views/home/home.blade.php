@extends('home.app')
@section('content')
    <form action="{{ Route('gallery.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body col-lg-1">
            <span class="btn btn-default btn-file">Выбрать файл<input type="file" name="img"></span>
        </div>
        <div class="box-body">
            <button type="submit" class="btn btn-primary col-md-1">Добавить</button>
        </div>

    </form>
    @if(!empty($images))
        <div class="container">
            <div class="row">
                @foreach($images as $image)

                    <div class="col-lg-3 col-md-4 col-6 thumb">
                        <a data-fancybox="gallery" href="{{ $image->img }}">
                            <img class="img-fluid" src="{{ $image->preview_img }}" alt="...">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
@section('css')
    <style>
        .thumb img {
            -webkit-filter: grayscale(0);
            filter: none;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 5px;
        }

        .thumb img:hover {
            -webkit-filter: grayscale(1);
            filter: grayscale(1);
        }

        .thumb {
            padding: 5px;
        }
    </style>
@endsection
@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
@endsection