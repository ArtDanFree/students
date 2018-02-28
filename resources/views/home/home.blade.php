@extends('home.app')
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
@section('content')
    <form action="{{ Route('gallery.store') }}" method="post">
        {{ csrf_field() }}
        <div class="box-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Добавить картинку</label>
                <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
                    <input id="thumbnail" class="form-control" type="text" name="img">
                </div>
            </div>
            <input hidden name="student_id" value="{{ Auth::id() }}">
            <button type="submit" class="btn btn-primary col-md-6">Добавить</button>
        </div>
    </form>

    @if(!empty($images))
        <div class="container">
            <div class="row">
                @foreach($images as $image)
                    <a data-fancybox="gallery" href="{{ $image->img }}">
                        <img style="width: 150px; height: 150px" class="img-fluid" src="{{ $image->img }}" alt="...">
                    </a>
                @endforeach
                </div>
        </div>
@endif


@endsection
@section('script')
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

<script>
    var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
</script>
<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
</script>
<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>

@endsection