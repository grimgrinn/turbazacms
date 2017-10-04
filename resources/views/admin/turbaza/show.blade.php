@extends('admin.layouts.app')


@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Управление</h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Все базы</h3>
                    <a href="{{route('turbaza.create')}}" style="margin-left: 15px;" class="btn btn-success">Добавить</a>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Создана</th>
                                    <th>Название</th>
                                    <th class="center-td">Коттеджей</th>
                                    <th class="center-td">Страниц</th>
                                    <th class="center-td">Опубликована</th>
                                    <th class="center-td">Редактировать</th>
                                    <th class="center-td">Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($turbazas as $turbaza)
                                    <tr>
                                        <td>{{explode(' ', $turbaza->created_at)[0]}}</td>
                                        <td>{{$turbaza->title}}</td>
                                        <td class="center-td">{{count($turbaza->cotteges)}}</td>
                                        <td class="center-td">{{count($turbaza->pages)}}</td>
                                        <td class="center-td"><i class="fa fa-{{$turbaza->status ? 'check green' : 'times'}}"></i></td>
                                        <td class="center-td"><a class="turbaza-edit"   data-turbaza="{{$turbaza->id}}" href="{{route('turbaza.edit',    $turbaza->id)}}"><i class="fa fa-pencil"></i></a></td>
                                        <td class="center-td"><a class="turbaza-delete" data-turbaza="{{$turbaza->id}}" href="{{route('turbaza.destroy', $turbaza->id)}}"><i class="fa fa-trash red"></i></a></td>
                                    </tr>
                                 @endforeach   
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Создана</th>
                                    <th>Название</th>
                                    <th class="center-td">Коттеджей</th>
                                    <th class="center-td">Страниц</th>
                                    <th class="center-td">Опубликована</th>
                                    <th class="center-td">Редактировать</th>
                                    <th class="center-td">Удалить</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footerSection')
    <script src="{{asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
        })

        $(document).ready(function(){
            console.log('ready');

            $('.turbaza-delete').click(function(e){
                e.preventDefault();
                if(confirm('Вы уверены что хотите удалить эту базу?')){
                    $(this).parent().parent().hide();
                    var href = this.pathname;
                    console.log(href, '<- href');
                    $.ajax({
                        url: href,
                        data: { "_token": "{{ csrf_token() }}" },
                        type: "DELETE",
                        success: function(response){
                            console.log(response);
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                }
            });
        });
    </script>
@endsection