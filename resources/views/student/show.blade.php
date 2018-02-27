@extends('layouts.app')
@section('content-header')
    <div class="row">
        <div class="col-lg-2">
            <a href="{{ Route('student.edit', $student) }}">
                <button type="button" class="btn btn-block btn-primary">Редактировать профиль</button>
            </a>
        </div>

        <div class="col-lg-2">
            <a href="{{ Route('studentValue.create', $student->id) }}">
                <button type="button" class="btn btn-block btn-primary">Выставить оценки</button>
            </a>
        </div>

        <div class="col-lg-2">
            <a href="{{ Route('studentValue.edit', $student->id) }}">
                <button type="button" class="btn btn-block btn-primary">Изменить оценки</button>
            </a>
        </div>
    </div>
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Responsive Hover Table</h3>

            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">

                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody><tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Дата рождения</th>
                    <th>Группа</th>
                    <th>Оценки</th>
                </tr>
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->dob}}</td>
                            <td>{{ $student->group->name or  'Не состоит в группе'}}</td>
                            <td>
                                @if($student->subject->isEmpty())
                                    Оценки еще не выставили
                                @else
                                    @foreach($student->subject as $item)
                                        {{ $item->name }}: {{ $item->pivot->value }} <br>
                                    @endforeach
                                @endif
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection
@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection
@section('script')
    <!-- DataTables -->
    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
