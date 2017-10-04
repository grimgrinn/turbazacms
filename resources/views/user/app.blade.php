<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    @include('user.layouts.head')
</head>
<body style="background-image: url(@yield('pic-page')); background-size: cover; background-repeat: no-repeat; background-color: @if(isset($bgcolor)){{$bgcolor->value}}@endif">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<container class="wrap-container">

    @include('user.layouts.header')

    <div class="main">

        <div class="wrap">

    @section('main-content')
        @show

        </div>

        <footer>

        </footer>

    </div>

    @section('sidebar')
        @show

</container>

@include('user.layouts.footer')

</body>
</html>
