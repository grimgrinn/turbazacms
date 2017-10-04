<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        {{--<div class="user-panel">--}}
            {{--<div class="pull-left image">--}}
                {{--<img src="{{asset("admin/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">--}}
            {{--</div>--}}
            {{--<div class="pull-left info">--}}
                {{--<p>Alexander Pierce</p>--}}
                {{--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<!-- search form -->--}}
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<!-- /.search form -->--}}
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('turbaza.index')}}">
                    <i class="fa fa-th"></i> <span>Управление</span>
                </a>
            </li>

            <li>
                <a href="{{route('settings.index')}}">
                    <i class="fa fa-gear"></i> <span>Настройки</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('turbaza.index') }}">
                    <i class="fa fa-home"></i> <span>Турбазы</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('turbaza.create')}}"><i class="fa fa-plus"></i>Добавить</a></li>

                    @foreach($globalTurbazas as $turbaza)
                        @if(count($turbaza->pages) == 0 && count($turbaza->cotteges) == 0)
                        <li><a href="{{route('turbaza.edit', $turbaza->id)}}"><i class="fa fa-circle-o"></i>{{$turbaza->title}}</a></li>
                        @else
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i>{{$turbaza->title}}
                                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                </a>
                                <ul class="treeview-menu">
                                    @if(count($turbaza->pages)>0)
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i>Текстовые страницы
                                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                        </a>
                                        <ul class="treeview-menu">
                                            @foreach($turbaza->pages as $page)
                                            <li><a href="{{route('page.edit', $page->id)}}"><i class="fa fa-circle-o"></i>{{$page->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endif
                                    @if(count($turbaza->cotteges)>0)
                                        <li class="treeview">
                                            <a href="#"><i class="fa fa-circle-o"></i>Коттеджи
                                                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                                            </a>
                                            <ul class="treeview-menu">
                                                @foreach($turbaza->cotteges as $cottege)
                                                    <li><a href="{{route('cottege.edit', $cottege->id)}}"><i class="fa fa-circle-o"></i>{{$cottege->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    @endforeach
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i>Турбаза 1</a></li>--}}
                    {{--<li class="treeview">--}}
                        {{--<a href="#"><i class="fa fa-circle-o"></i>Турбаза 2--}}
                            {{--<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>--}}
                        {{--</a>--}}
                        {{--<ul class="treeview-menu">--}}
                            {{--<li><a href="#"><i class="fa fa-circle-o"></i>Коттеджи</a></li>--}}
                            {{--<li class="treeview">--}}
                                {{--<a href="#"><i class="fa fa-circle-o"></i>Текстовые страницы--}}
                                    {{--<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>--}}
                                {{--</a>--}}
                                {{--<ul class="treeview-menu">--}}
                                    {{--<li><a href="#"><i class="fa fa-circle-o"></i>Бассейн</a></li>--}}
                                    {{--<li><a href="#"><i class="fa fa-circle-o"></i>Проститутки</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-circle-o"></i>Турбаза 3</a></li>--}}
                </ul>
            </li>
            <li>
                <a href="{{route('user.index')}}">
                    <i class="fa fa-users"></i> <span>Пользователи</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>