@extends('layouts.app')
@section('content')
    @foreach($groups as $group)
        @if(!empty($group))
        <h1 class="text-center">{{ $group->name }}</h1>
        <h4 class="text-center">{{ $group->description }}</h4>
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
                        <th>Оценки</th>
                        <th>Средняя оценка</th>
                    </tr>

                        @foreach($group->student as $student)
                            <tr class="
                                @if($student->subject->avg('pivot.value') <= 3)
                                    danger
                                    @elseif($student->subject->avg('pivot.value') == 5)
                                    success
                                    @elseif($student->subject->avg('pivot.value') >= 4.5)
                                    warning
                                @endif">
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->full_name }}</td>
                                <td>{{ $student->dob}}</td>
                                <td>
                                    @foreach($student->subject as $subjects)
                                        {{ $subjects->name }}: {{ $subjects->pivot->value }} <br>
                                    @endforeach
                                </td>
                                <td>{{ $student->subject->avg('pivot.value') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box col-lg-3 center-block">
            <div class="box-header">
                <h3 class="box-title">Подсчет средних оценок</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table table-condensed">
                    <tbody>
                    @foreach($group->student->pluck('subject')->collapse()->groupBy('id') as $subjects)
                    <tr>
                        <td>
                            Средний балл группы по предмету: {{ $subjects[0]->name }}: {{ $subjects->avg('pivot.value') }}
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                            Общий средний балл группы: {{ $group->student->pluck('subject')->collapse()->avg('pivot.value') }}
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        @endif
    @endforeach

    <h1 class="text-center">Лучшие студенты</h1>
    <div class="box col-lg-3 center-block">
        <div class="box-header">
            <h3 class="box-title">Лучшие студенты</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tbody>
                @foreach ($students as $student)
                    @if($student->subject->avg('pivot.value') >=4.5)
                        <tr>
                    <td>
                        {{ $student->full_name }} Средний балл: {{  $student->subject->avg('pivot.value')  }}
                    </td>
                </tr>
                @endif
                @endforeach

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
