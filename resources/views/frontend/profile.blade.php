@extends('frontend.component.master')

@section('content')
<div class="container">
    <div id="carousel-profile" class="owl-carousel owl-theme">
        @foreach($data as $row)
            @if($row->embed == Null)
                <iframe width="100%" height="600px" src="https://www.youtube.com/embed/il3x_A2wgsE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            @else
                <img src="http://derma-express.com/storage/175/Program_5f27e4094703e.jpg" style="height: 600px; width: 100%;">
            @endif
        @endforeach
    </div>
</div>
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