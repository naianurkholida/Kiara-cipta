@extends('frontend.component.master')

@section('content')
<div class="container">
    <div id="carousel-profile" class="owl-carousel owl-theme">
        <iframe width="100%" height="600px" src="https://www.youtube.com/embed/il3x_A2wgsE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <img src="http://derma-express.com/storage/145/design-web---cleansing-milk.jpg" alt="">
    </div>
</div>
{{-- <div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container" id="container_luar">
        <div class="container" id="container_dalem">
            <div class="row">
                <div class="col-lg-12">
                    {!! $content->konten_page !!}
                </div>
            </div>
        </div>
    </div>

</div> --}}
@endsection

@section('js')
    <script>
        
        if (window.matchMedia('(max-width: 425px)'))
        {
            $( "#container_dalem" ).removeClass("container");
            $( "#container_luar" ).removeClass("container").addClass("container-fluid");
            $( "#text-content").css("width", "100%");
            $( "#img-content").css("width", "100%");
        } else {
            $( "#container_dalem" ).addClass("container");
            $( "#container_luar" ).removeClass("container-fluid").addClass("container");
        }
    </script>
@endsection