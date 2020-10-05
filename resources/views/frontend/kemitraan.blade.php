@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;padding-left: 300px;padding-right: 350px;">
    
    <div class="container" id="container_luar">
        <div class="container" id="container_dalem"><!-- 
            <iframe style="border:0px #ffffff none;" width="100%" height="800px;" src="http://103.11.134.45:1717/apex/f?p=889:2" scrolling="no" frameborder="1" allowfullscreen=""></iframe> -->
            <iframe style="border:0px #ffffff none;" width="100%" height="800px;" src="http://103.11.135.109:1717/apex/f?p=889:2" scrolling="no" frameborder="1" allowfullscreen=""></iframe>
        </div>
    </div>

</div>
@endsection


@section('js')
    <script>
        
        if (window.matchMedia('(max-width: 425px)'))
        {
            $( "#container_dalem" ).removeClass("container");
            $( "#container_luar" ).removeClass("container").addClass("container-fluid");
        } else {
            $( "#container_dalem" ).addClass("container");
            $( "#container_luar" ).removeClass("container-fluid").addClass("container");
        }
    </script>
@endsection