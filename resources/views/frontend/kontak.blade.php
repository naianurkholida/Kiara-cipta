@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">Kontak</h3>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {!! $content->konten_page !!}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection