@extends('admin.layouts.app')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Страница
                <small>редактор</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">@if(isset($page)) {{$page->title}} @else Страница нэйм @endif</h3>
                        </div>
                        @include('includes.messages')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" id="pageForm" name="pageForm" @if (isset($page->id)) action="{{ route('page.update', $page->id) }}" @else action="{{ route('page.store') }}" @endif  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="turbaza_id" value="@if(isset($turbaza)){{$turbaza}}@elseif(isset($page)){{$page->turbaza_id}}@endif">
                            <input type="hidden" name="page_id" value="@if(isset($page)){{$page->id}}@endif">
                            @if (isset($page->id))
                                <input name="_method" type="hidden" value="PUT">
                            @endif
                            {{--<input type="hidden" name="turbaza_id" value="{{ $turbaza_id }}">--}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Название" @if(isset($page)) value="{{$page->title}}" @endif>
                                </div>

                                <div class="form-group">
                                    <label for="multiple-images-input">Изображение</label>
                                    <input type="file" id="multiple-images-input" name="image[]" multiple>
                                </div>
                                <div class="form-group">
                                    @if(isset($page))
                                    @foreach($images as $image)
                                            <div class="img-wrap">
                                                <a href="{{route('image.destroy', $image->id)}}" class="delete-img red" data-id="{{$image->id}}"><i class="fa fa-times-circle"></i></a>
                                                <img src="{{asset($image->path)}}" alt=""  width="100">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="picture_page" @if(isset($page) && $page->pic_page == 1) checked="checked" @endif> Страница-картинка
                                    </label>
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Текст</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                            <i class="fa fa-minus"></i></button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <textarea class="textarea" placeholder="Текст" name="text" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if(isset($page)){{$page->text}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cols">Разбить на вот столько колонок</label>
                                    <select name="cols" id="cols" @if(isset($page)) current="{{$page->cols}}" @endif>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                {{--<button type="submit" class="btn btn-primary" @if (isset($page)) onclick="pageUpdate(event)" @endif>Сохранить</button>--}}
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                @if(!isset($turbaza))
                                    <?php $turbaza = $page->turbaza_id ?>
                                @endif
                                    <a href="/admin/turbaza/{{$turbaza}}/edit#pages" class="btn btn-success">Все страницы</a>

                            </div>
                        </form>
                    </div>


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footerSection')
    <script>
        var pageUpdate = function(e) {
            e.preventDefault();
            var target = document.forms['pageForm'].elements['page_id'].value;
            var baza = document.forms['pageForm'].elements['turbaza_id'].value;
            var data = $('#pageForm').serialize();
            console.log(data);

            $.ajax({
                url: "/admin/page/"+target,
                data: data,
                type: "PUT",
                success: function(respond){
                    console.log(respond);
                    alert('Изменения успешно сохранены');
                    window.location = "/admin/turbaza/" + baza + '/edit#pages';
                },
                error: function(error){
                    console.log(error);
                }
            });

        };

        $(document).ready(function(){
            $('#cols').val($('#cols').attr('current'));
        });
    </script>
@endsection