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
            <h3 class="box-title">Добавление новой группы</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ Route('group.update', $group->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Название Группы</label>
                    <input name="name" class="form-control" placeholder="Название Группы" value="{{ $group->name }}"
                           required>
                </div>
                <div class="form-group">
                    <label>Описание Группы</label>
                    <textarea class="form-control" rows="3" placeholder="Описание Группы" name="description"required>{{ $group->description }}</textarea>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
        </form>
    </div>
@endsection
