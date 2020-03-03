@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">Blog</h3>
        </div>
    </div>
    <div class="container">
        <div class="container">
            @include('frontend.component.layouts.item-detail', ['related' => 'getPostingLanguage', 'column' => 'content','image' => 'posting'])
        </div>
    </div>
</div>
@endsection