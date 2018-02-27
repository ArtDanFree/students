@extends('layouts.app')
@section('content-header')
    <div class="row">
        <div class="col-lg-3 col-sm-4">
            <a href="{{ Route('student.create') }}">
                <button type="button" class="btn btn-block btn-default">Добавить студента</button>
            </a>
        </div>
    </div>
@endsection
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>ФИО</th>
                    <th>Группа</th>
                    <th>Оценки</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($students))
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->group->name or  'Не состоит в группе'}}</td>
                            <td>
                                @foreach($student->subject as $item)
                                    {{ $item->name }}: {{ $item->pivot->value }} <br>
                                @endforeach
                            </td>
                            <td>
                                    <a href="{{ Route('student.show', $student) }}"><button type="button" class="btn btn-block btn-default">Детальная страница</button></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
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