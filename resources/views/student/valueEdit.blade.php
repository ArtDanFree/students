@extends('layouts.app')
@section('content-header')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Выставление оценок ученику: {{ $student->name }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ Route('studentValue.Update', $student->id) }}" method="post">
            {{ csrf_field() }}
            <div class="box-body">
                @foreach($subjects as $subject)
                    <div class="form-group">
                        <label>{{ $subject->name }}</label>
                        <input name="{{ $subject->id }}" class="form-control" placeholder="Поставьте оценку" value="{{ $subject->pivot->value }}"
                               required>
                    </div>
                @endforeach

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('css')
@endsection

@section('script')
@endsection
