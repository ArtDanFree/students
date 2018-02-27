@extends('layouts.app')
@section('content-header')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Редактирование Предмета</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ Route('subject.update', $subject)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название придмета</label>
                    <input name="name" class="form-control" placeholder="Название Предмета" value="{{ $subject->name }}"
                           required>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </div>
        </form>
    </div>
@endsection