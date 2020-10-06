@extends('frontend.component.master')

@section('content')
@include('frontend.component.layouts.slider')

@include('frontend.component.layouts.welcome')

@include('frontend.component.layouts.treatment')

@include('frontend.component.layouts.bestseller')

<div class="pop-container">
    <div class="box-pop">
        <div class="close-pop">X</div>
        <div class="img-pop" style="background-image: url({{ Helper::iklan() }})"></div>
    </div>
</div>

@endsection