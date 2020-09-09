@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
 
    <div class="container">
        <div class="container" id="container_dalem">
            <div class="row">
                <iframe style="border:0px #ffffff none;" width="100%" height="1000px;" src="{{url('')}}/promosi/{{$seo}}" scrolling="no" frameborder="1" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
    <script>
        
        if (window.matchMedia('(max-width: 425px)'))
        {
            $( "#container_dalem" ).removeClass("container");
        } else {
            $( "#container_dalem" ).addClass("container");
        }
    </script>
@endsection