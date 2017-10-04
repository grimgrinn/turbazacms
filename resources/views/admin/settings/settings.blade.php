@extends('admin.layouts.app')

@section('main-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Настройки
                <small>редактор</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#background" data-toggle="tab">Фон</a></li>
                            <li><a href="#contacts" data-toggle="tab">Контакты</a></li>
                            <li><a href="#collabs" data-toggle="tab">Сотрудничество</a></li>
                            <li><a href="#info" data-toggle="tab">Информация для клиентов</a></li>
                        </ul>

                        <div class="tab-content">
                            <div class="active tab-pane" id="background">
                                <h3 class="box-title">Фон</h3>
                                <div class="box">
                                    <form id="backgroundForm" action="/admin/settings/background" class="setting-form" name="background" role="form"   method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Фон</h3>
                                                <div class="pull-right box-tools">
                                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                            title="Collapse">
                                                        <i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body pad">
                                                <input type="color" name="color" value="@if(isset($color)){{$color->value}}@endif">
                                            </div>
                                        </div>

                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane" id="contacts">
                                <h3 class="box-title">Контакты</h3>
                                <div class="box">
                                    <form id="contactsForm" action="/admin/settings/contacts" class="setting-form" name="contacts" role="form"  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="box">
                                                <div class="box-header">
                                                    <h3 class="box-title">Текст страницы</h3>
                                                    <div class="pull-right box-tools">
                                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                                title="Collapse">
                                                            <i class="fa fa-minus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="box-body pad">
                                                    <textarea class="textarea" placeholder='Текст страницы "Контакты"' name="сontacts" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if (isset($contacts)) {{$contacts->text}} @endif</textarea>
                                                </div>
                                            </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane" id="collabs">
                                <h3 class="box-title">Сотрудничество</h3>
                                <div class="box">
                                    <form class="setting-form" action="/admin/settings/collabs"  class="setting-form" id="collabsForm" name="collabs" role="form"  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Текст страницы</h3>
                                                <div class="pull-right box-tools">
                                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                            title="Collapse">
                                                        <i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body pad">
                                                <textarea class="textarea" placeholder='Текст страницы "Сотрудничество"' name="collabs" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if (isset($collabs)) {{$collabs->text}} @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane" id="info">
                                <h3 class="box-title">Информация для клиентов</h3>
                                <div class="box">
                                    <form id="infoForm" action="/admin/settings/info" class="setting-form" name="info" role="form"  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Текст страницы</h3>
                                                <div class="pull-right box-tools">
                                                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                            title="Collapse">
                                                        <i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="box-body pad">
                                                <textarea class="textarea" placeholder='Текст страницы "Информация для клиентов"' name="info" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if (isset($info)) {{$info->text}} @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection

@section('footerSection')
    <script>
        $(document).ready(function(){
//                $('.setting-form').submit(function(e){
//                    e.preventDefault();
//                    var path = this.name;
//                    var data = $(this).serialize();
//                     $.ajax({
//                         type: 'POST',
//                         data: data,
//                         url: '/admin/settings/' + path,
//                         success: function(response){
//                             console.log(response);
//                         },
//                         error: function(error){
//                             console.log(error);
//                         }
//                     });
            });
    </script>
@endsection