@extends('user.app')

@section('main-caption')
    {{$page->title}}
@endsection
@section('main-content')

    <div class="text-content">
        <div class="row" style="margin-right:20px;">

            <div class="col-md-12 col-sm-12 column" style="word-wrap: break-word;">{{$page->text}}</div>

        </div>
    </div>

@endsection


@section('sidebar')
    @include('user.layouts.sidebar')
@endsection