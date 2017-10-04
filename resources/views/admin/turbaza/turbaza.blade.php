@extends('admin.layouts.app')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Турбаза
                <small>редактор</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#edit" data-toggle="tab">Редактор</a></li>
                            @if(isset($turbaza))
                                <li><a href="#cotteges" data-toggle="tab">Коттеджи</a></li>
                                <li><a href="#pages" data-toggle="tab">Страницы</a></li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="edit">
                                <div class="">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">@if (isset($turbaza->title)) {{$turbaza->title}} @else Новая турбаза @endif</h3>
                                    </div>
                                @include('includes.messages')
                                <!-- /.box-header -->
                                    <!-- form start -->
                                    <form id="turbazaForm" name="turbazaForm" role="form" @if (isset($turbaza->id)) action="{{ route('turbaza.update', $turbaza->id) }}" @else action="{{ route('turbaza.store') }}" @endif  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @if (isset($turbaza->id))
                                            <input name="_method" type="hidden" value="PUT">
                                        @endif
                                        <input type="hidden" name="turbaza_id" @if (isset($turbaza->id)) value="{{$turbaza->id}}" @endif>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="title">Название</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Название" @if (isset($turbaza->title)) value="{{$turbaza->title}}" @endif>
                                            </div>

                                            <div class="form-group">
                                            <label for="slug">Слаг</label>
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Слаг" @if (isset($turbaza)) value="{{$turbaza->slug}}" @endif>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputFile">Изображение</label>
                                                <input type="file" id="exampleInputFile" name="image[]" multiple>
                                            </div>
                                            <div class="form-group">
                                                @if(isset($turbaza))
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
                                                    <input type="checkbox" name="status" @if (isset($turbaza->status) && $turbaza->status == 1)) checked="checked" @endif> Опубликована
                                                </label>
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
                                                <textarea class="textarea" placeholder="Описание" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if (isset($turbaza->description)) {{$turbaza->description}} @endif</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="cols">Разбить на вот столько колонок</label>
                                                <select name="cols" id="cols" @if(isset($turbaza)) current="{{$turbaza->cols}}" @endif>
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
                                            {{--<button class="btn btn-primary" @if (isset($turbaza)) onclick="turbazaUpdate(event)" @endif>Сохранить</button>--}}
                                            <button class="btn btn-primary">Сохранить</button>
                                            <a href="{{route('turbaza.index')}}" class="btn btn-danger">Назад</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            @if(isset($cotteges))
                            <div class="tab-pane" id="cotteges">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Коттеджи</h3>
                                        <a href="{{route('cottege.goodcreate', $turbaza->id)}}" style="margin-left: 15px;" class="btn btn-success">Добавить</a>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                                    title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="box">
                                            <div class="box-body">
                                                @if(count($cotteges)>0)
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Номер</th>
                                                        <th>Название</th>
                                                        <th class="center-td">Цена</th>
                                                        <th class="center-td">К-во людей</th>
                                                        <th class="center-td">Редактировать</th>
                                                        <th class="center-td">Удалить</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($cotteges as $cottege)
                                                        <tr>
                                                            <td>{{$cottege->id}}</td>
                                                            <td>{{$cottege->title}}</td>
                                                            <td class="center-td">{{$cottege->price}}</td>
                                                            <td class="center-td">{{$cottege->persons}}</td>
                                                            <td class="center-td"><a class="cottege-edit"   data-cottege="{{$cottege->id}}" href="{{route('cottege.edit',    $cottege->id)}}"><i class="fa fa-pencil"></i></a></td>
                                                            <td class="center-td"><a class="cottege-delete" data-cottege="{{$cottege->id}}" href="{{route('cottege.destroy', $cottege->id)}}"><i class="fa fa-trash red"></i></a></td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="6" class="center-td">Коттеджей пока нет</td></tr>
                                                    @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Номер</th>
                                                        <th>Название</th>
                                                        <th class="center-td">Цена</th>
                                                        <th class="center-td">К-во людей</th>
                                                        <th class="center-td">Редактировать</th>
                                                        <th class="center-td">Удалить</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                @else
                                                    Коттеджей пока нет
                                                @endif
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">

                                    </div>
                                    <!-- /.box-footer-->
                                </div>
                            </div>
                            @endif

                            @if(isset($pages))
                            <div class="tab-pane" id="pages">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Страницы</h3>
                                        <a href="{{route('page.goodcreate', $turbaza->id)}}" style="margin-left: 15px;" class="btn btn-success">Добавить</a>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                                    title="Collapse">
                                                <i class="fa fa-minus"></i></button>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <div class="box">
                                            <div class="box-body">
                                                @if(count($pages)>0)
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Номер</th>
                                                        <th>Название</th>
                                                        <th class="center-td">Тип</th>
                                                        <th class="center-td">Редактировать</th>
                                                        <th class="center-td">Удалить</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($pages as $page)
                                                        <tr>
                                                            <td>{{$page->id}}</td>
                                                            <td>{{$page->title}}</td>
                                                            <td class="center-td">{{$page->pic_page ? 'Картинка' : 'Текст'}}</td>
                                                            <td class="center-td"><a class="page-edit"   data-page="{{$page->id}}" href="{{route('page.edit',    $page->id)}}"><i class="fa fa-pencil"></i></a></td>
                                                            <td class="center-td"><a class="page-delete" data-page="{{$page->id}}" href="{{route('page.destroy', $page->id)}}"><i class="fa fa-trash red"></i></a></td>
                                                        </tr>
                                                    @empty
                                                        <tr><td colspan="5" class="center-td">Страниц пока нет</td></tr>
                                                    @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Номер</th>
                                                        <th>Название</th>
                                                        <th class="center-td">Тип</th>
                                                        <th class="center-td">Редактировать</th>
                                                        <th class="center-td">Удалить</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                @else
                                                    Страниц пока нет
                                                @endif
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">

                                    </div>
                                    <!-- /.box-footer-->
                                </div>
                            </div>
                            @endif

                        <!-- /.tab-content -->
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
    <script src="{{asset('admin/dist/js/turntub.js')}}"></script>
    <script>
        var turbazaUpdate = function(e) {
            e.preventDefault();
            var target = document.forms['turbazaForm'].elements['turbaza_id'].value
            var data = $('#turbazaForm').serialize();
         //   var data = new FormData(document.getElementById('turbazaForm'));
            console.log(data);

            $.ajax({
                url: "/admin/turbaza/"+target,
                data: data,
                type: "PUT",
//                processData: false,
//                contentType: false,
//                headers: {
//                    'X-CSRF-Token': $('input[name="_token"]').val()
//                },
                success: function(respond){
                    console.log(respond);
                    alert('Изменения успешно сохранены');
                },
                error: function(error){
                    console.log(error);
                }
            });

        };

        $(document).ready(function(){
            console.log();

            $('#cols').val($('#cols').attr('current'));


            $('.page-delete').click(function(e){
                e.preventDefault();
                if(confirm('Вы уверены что хотите удалить эту страницу?')){
                    $(this).parent().parent().hide();
                    var href = this.pathname;
                    console.log(href, '<- href deleting page');
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

            $('.cottege-delete').click(function(e){
                e.preventDefault();
                if(confirm('Вы уверены что хотите удалить этот коттедж?')){
                    $(this).parent().parent().hide();
                    var href = this.pathname;
                    console.log(href, '<- href deleting cottege');
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

        function translit(){
// Символ, на который будут заменяться все спецсимволы
            var space = '-';
// Берем значение из нужного поля и переводим в нижний регистр
            var text = $('#title').val().toLowerCase();

// Массив для транслитерации
            var transl = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
                'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
                'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya',
                ' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
                '#': space, '$': space, '%': space, '^': space, '&': space, '*': space,
                '(': space, ')': space,'-': space, '\=': space, '+': space, '[': space,
                ']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
                '{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
                '?': space, '<': space, '>': space, '№':space
            }

            var result = '';
            var curent_sim = '';

            for(i=0; i < text.length; i++) {
                // Если символ найден в массиве то меняем его
                if(transl[text[i]] != undefined) {
                    if(curent_sim != transl[text[i]] || curent_sim != space){
                        result += transl[text[i]];
                        curent_sim = transl[text[i]];
                    }
                }
                // Если нет, то оставляем так как есть
                else {
                    result += text[i];
                    curent_sim = text[i];
                }
            }

            result = TrimStr(result);

// Выводим результат
            $('#slug').val(result);

        }
        function TrimStr(s) {
            s = s.replace(/^-/, '');
            return s.replace(/-$/, '');
        }
        // Выполняем транслитерацию при вводе текста в поле
        $(function(){
            $('#title').keyup(function(){
                translit();
                return false;
            });
        });
    </script>
@endsection