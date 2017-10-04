<aside class="sidebar">
    <div class="header">
        <div class="logo-wrap">
            <div class="picture-page-sidebar-caption">{{$title}}</div>
        </div>
    </div>


    <nav class="sidebar-tur-nav">
        <h3>Меню:</h3>
        <ul>
            <li><a href="{{route('user.turbaza.about', $slug)}}">О базе</a></li>
            <li><a href="{{route('user.turbaza.show', $slug)}}">Проживание</a></li>
            @foreach($pages as $page)
                <li><a href="/page/{{$page->id}}">{{$page->title}}</a></li>
            @endforeach

        </ul>
        <a href="/" class="to-catalog">К каталогу</a>
    </nav>
    <div class="bottom-logo">
        <a href="/"><img src="{{asset('user/img/wide-logo.png')}}" height="22" width="82"></a>
    </div>
</aside>