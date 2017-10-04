@extends('user.turbaza')

@section('main-caption', $page->title)

@if($page->pic_page)
    @section('pic-page')
        {{asset($page->availableImages->first()->path)}}
    @endsection
@endif

@section('main-content')
    <?php
    $columns = splitIntoColumns ($page->text, $page->cols, ' ');
    ?>
    @if(!$page->pic_page)
    <div class="text-content">
        <div class="row" style="margin-right:20px;">
            @foreach($columns as $column)
                <div class="col-md-{{(int) floor(12/$page->cols)}} col-sm-12 column" style="word-wrap: break-word;">{!! strip_tags($column) !!}</div>
            @endforeach
        </div>

        <div class="row" style="margin-right:20px;">
            <div class="col-md-{{(int) floor(12/$page->cols)}} col-md-offset-{{12 - (int) floor(12/$page->cols)}} col-sm-12">
                <div class="picture-column">
                    {{--<div class="text-pictures">--}}
                    {{--<img src="{{asset('user/img/text-page-pic.png')}}" height="195" width="442" alt="" class="text-picture">--}}
                    {{--</div>--}}
                    <div id="gallery" class="gallery">
                        {{--{{dd($page)}}--}}
                        @if(isset($page->availableImages))
                            @foreach($page->availableImages as $image)
                                <a href="{{asset($image->path)}}" class="image-wrapper">
                                    <img src="{{asset($image->path)}}" alt="">
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection

@section('footerSection')
    <script type="text/javascript">
        $(document).ready(function() {
            var columnWidth = $('.column').last().width();
            $("#gallery").lightGallery({
                thumbnail:true,
                animateThumb: false,
                showThumbByDefault: false
            });

            $('#gallery').bxSlider({
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


