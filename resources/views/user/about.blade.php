@extends('user.turbaza')

@section('main-caption')
    {{$slug->title . ': Проживание'}}
@endsection
@section('main-content')
    <?php
            $columns = splitIntoColumns ($slug->description, $slug->cols, ' ');
    ?>
    <div class="text-content">
            <div class="row" style="margin-right:20px;">
                @foreach($columns as $column)
                    <div class="col-md-{{(int) floor(12/$slug->cols)}} col-sm-12" style="word-wrap: break-word;">{!! strip_tags($column) !!}</div>
                @endforeach
            </div>

        <div class="row" style="margin-right:20px;">
            <div class="col-md-{{(int) floor(12/$slug->cols)}} col-md-offset-{{12 - (int) floor(12/$slug->cols)}} col-sm-12">
                <div class="picture-column">
                    <div id="gallery" class="gallery">
                        @if(isset($images))
                            @foreach($images as $image)
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
                adaptiveHeight: true,
                controls: false
            });
        });
    </script>
@endsection


