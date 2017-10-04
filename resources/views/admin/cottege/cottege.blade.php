@extends('admin.layouts.app')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Коттедж
                <small>редактор</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">@if(isset($cottege)) {{$cottege->title}} @else Коттедж нэйм @endif</h3>
                        </div>
                        @include('includes.messages')
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" id="cottegeForm" name="cottegeForm" @if (isset($cottege->id)) action="{{ route('cottege.update', $cottege->id) }}" @else action="{{ route('cottege.store') }}" @endif  method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="turbaza_id" value="@if(isset($turbaza)){{ $turbaza }}@elseif(isset($cottege)){{$cottege->turbaza_id}}@endif">
                            <input type="hidden" name="cottege_id" value="@if(isset($cottege)){{$cottege->id}}@endif">
                            @if (isset($cottege->id))
                                <input name="_method" type="hidden" value="PUT">
                            @endif
                            {{--<input type="hidden" name="turbaza_id" value="{{ $turbaza_id }}">--}}
                            <div class="box-body">

                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Название" @if(isset($cottege)) value="{{$cottege->title}}" @endif>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Изображение</label>
                                        <input type="file" id="exampleInputFile" name="image[]" multiple>
                                    </div>
                                    <div class="form-group">
                                        @if(isset($cottege))
                                            @foreach($images as $image)
                                                <div class="img-wrap">
                                                    <a href="{{route('image.destroy', $image->id)}}" class="delete-img red" data-id="{{$image->id}}"><i class="fa fa-times-circle"></i></a>
                                                    <img src="{{asset($image->path)}}" alt=""  width="100">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="price">Цена</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Цена" @if(isset($cottege)) value="{{$cottege->price}}" @endif>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantity">Количество персон</label>
                                        <input type="number" class="form-control" id="persons" name="persons" placeholder="Количество людей" @if(isset($cottege)) value="{{$cottege->persons}}" @endif>
                                    </div>
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Описание</h3>
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
                                    <textarea class="textarea" placeholder="Описание" name="description"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if(isset($cottege)){{$cottege->description}}@endif</textarea>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                {{--<button type="submit" class="btn btn-primary" @if (isset($cottege)) onclick="cottegeUpdate(event)" @endif>Сохранить</button>--}}
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                                @if(!isset($turbaza))
                                    <?php $turbaza = $cottege->turbaza_id ?>
                                @endif
                                <a href="/admin/turbaza/{{$turbaza}}/edit#cotteges" class="btn btn-success">Все коттеджи</a>
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
        var cottegeUpdate = function(e) {
            e.preventDefault();
            var target = document.forms['cottegeForm'].elements['cottege_id'].value;
            var baza   = document.forms['cottegeForm'].elements['turbaza_id'].value;
            var data   = $('#cottegeForm').serialize();
            console.log(data);

            $.ajax({
                url: "/admin/cottege/"+target,
                data: data,
                type: "PUT",
                success: function(respond){
                    console.log(respond);
                    alert('Изменения успешно сохранены');
                    window.location = "/admin/turbaza/" + baza + '/edit#cotteges';
                },
                error: function(error){
                    console.log(error);
                }
            });

        };
    </script>
@endsection