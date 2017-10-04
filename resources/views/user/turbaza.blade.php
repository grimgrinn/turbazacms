@extends('user.app')

@section('main-caption')
    {{$slug->title . ': Проживание'}}
@endsection
@section('main-content')

    @foreach($cotteges as $cottege)
    <div class="room-item">
        <div class="room-item-info room-item-caption">{{$cottege->title}}</div>
        <div class="room-item-info room-item-price">
            <span>Цена:</span> {{$cottege->price}} р/сутки
        </div>
        <div class="room-item-info room-item-persons">
            Проживание на {{$cottege->persons}} человек
        </div>


        <div class="room-item-info room-item-cut">
            <a href="">Подробнее...</a>
        </div>

        <div class="room-item-info room-item-description">
            {!! htmlspecialchars_decode($cottege->description) !!}
        </div>

        <div class="room-item-gallery">
            @if(count($cottege->availableImages) > 0)
                <div class="gallery">
                    @foreach($cottege->availableImages as $image)
                        <a href="{{asset($image->path)}}" class="image-wrapper">
                            <img src="{{asset($image->path)}}" alt="">
                        </a>
                    @endforeach
                </div>
            @else
                    <img src="{{asset('user/img/room-pic.png')}}" height="129" width="289" alt="">
                    <nav>
                        <ul class="room-item-gallery-navigation">
                            <li class="active-li"></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </nav>
             @endif
            </div>

    </div>
    @endforeach
@endsection

@section('sidebar')
    @include('user.layouts.turbazasidebar', ['title'=>$slug->title, 'pages'=>$pages, 'slug'=>$slug->slug])
@endsection


@section('footerSection')
    <script type="text/javascript">
        $(document).ready(function() {
            var columnWidth = $('.room-item-gallery').first().width();
            $(".gallery").lightGallery({
                thumbnail:true,
                animateThumb: false,
                showThumbByDefault: false
            });

            $('.gallery').bxSlider({
                slideWidth: columnWidth,
                minSlides: 1,
                maxSlides: 1,
                slideMargin: 0,
                adaptiveHeight: false,
                controls: false
            });
        });
    </script>
@endsection

