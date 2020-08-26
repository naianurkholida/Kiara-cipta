@extends('frontend.component.master')

@section('content')
<div class="container">
    <div id="carousel-profile" class="owl-carousel owl-theme">
        @foreach($category as $row)
            @foreach($row->getGallery as $val)
                @if($val->embed == Null)
                    <iframe width="100%" height="600px" src="{{ $val->getFirstMediaUrl('gallery') }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
                @else
                    <img src="{{ $val->getFirstMediaUrl('gallery') }}" style="height: 600px; width: 100%;">
                @endif
            @endforeach
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