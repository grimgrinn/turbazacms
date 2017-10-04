<aside class="sidebar">
    <div class="header">
        <div class="logo-wrap">
            <a href="/"><img src="{{asset('user/img/wide-logo2.png')}}" alt="" style="margin-left: 36px;"></a>
        </div>
    </div>

    <nav class="sidebar-nav">
        <ul>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/collabs">Сотрудничество</a></li>
            <li><a href="/info">Информация для клиентов</a></li>
        </ul>
    </nav>

    <nav class="sidebar-tur-nav">
        <ul>
            @foreach($globalTurbazas as $turbaza)
                <li><a href="{{route('user.turbaza.show', $turbaza->slug)}}">{{$turbaza->title}}</a></li>
            @endforeach

        </ul>
    </nav>
</aside>