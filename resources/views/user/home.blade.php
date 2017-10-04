@extends('user.app')
@section('main-caption')
    {!! htmlspecialchars_decode("ИНТЕРНЕТ КАТАЛОГ БАЗ ОТДЫХА <span>- 2017 -</span>") !!}
@endsection

@section('main-content')

            @foreach($globalTurbazas as $turbaza)

                <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                    <div class="flipper">
                        <div class="front tur-item">
                            <div class="tur-item-text">
                                <h3>База отдыха <a href="{{route('user.turbaza.show', $turbaza->slug)}}">"{{$turbaza->title}}"</a></h3>
                                <div class="tur-item-price">
                                @if(count($turbaza->cotteges)>0) от {{$turbaza->cotteges->first()->price}} руб. @endif
                                </div>
                            </div>
                            @if(count($turbaza->images)>0)
                                <img src="{{asset($turbaza->images->first()->path)}}" height="145" width="145" alt="" class="tur-item-img" />
                            @else
                                <img src="{{asset('user/img/pic.png')}}" height="145" width="145" alt="" class="tur-item-img" />
                            @endif
                        </div>

                        <div class="back tur-item">
                            <h3>База отдыха <a href="{{route('user.turbaza.show', $turbaza->slug)}}">"{{$turbaza->title}}"</a></h3>
                            {!! htmlspecialchars_decode($turbaza->description) !!}
                        </div>
                    </div>
                </div>

                {{--<div class="tur-item flip-container" ontouchstart="this.classList.toggle('hover');">--}}
                    {{--<div class="flipper">--}}
                        {{--<div class="front">--}}
                            {{--<div class="tur-item-text">--}}
                                {{--<h3>База отдыха <a href="{{route('user.turbaza.show', $turbaza->slug)}}">"{{$turbaza->title}}"</a></h3>--}}
                                {{--<div class="tur-item-price">--}}
                                    {{--@if(count($turbaza->cotteges)>0) от {{$turbaza->cotteges->first()->price}} руб. @endif--}}
                                {{--</div>--}}

                                {{--<div class="tur-item-description1">--}}
                                    {{--{!! htmlspecialchars_decode($turbaza->description) !!}--}}
                                {{--</div>--}}
                                {{--<img src="{{asset('user/img/pic.png')}}" height="145" width="145" alt="" class="tur-item-img" />--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="back">--}}
                            {{--<h3>База отдыха <a href="{{route('user.turbaza.show', $turbaza->slug)}}">"{{$turbaza->title}}"</a></h3>--}}

                            {{--<div class="tur-item-price">--}}
                                {{--@if(count($turbaza->cotteges)>0) от {{$turbaza->cotteges->first()->price}} руб. @endif--}}
                            {{--</div>--}}

                            {{--<div class="tur-item-description1">--}}
                                {{--{!! htmlspecialchars_decode($turbaza->description) !!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="tur-item-text">--}}
                        {{--<h3>База отдыха <a href="{{route('user.turbaza.show', $turbaza->slug)}}">"{{$turbaza->title}}"</a></h3>--}}
                        {{--<div class="tur-item-price">--}}
                           {{--@if(count($turbaza->cotteges)>0) от {{$turbaza->cotteges->first()->price}} руб. @endif--}}
                        {{--</div>--}}

                        {{--<div class="tur-item-description">--}}
                            {{--{!! substr(htmlspecialchars_decode($turbaza->description), 0, 140) !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<img src="{{asset('user/img/pic.png')}}" height="145" width="145" alt="" class="tur-item-img" />--}}
                {{--</div>--}}
            @endforeach
@endsection

@section('sidebar')
    @include('user.layouts.sidebar')
@endsection