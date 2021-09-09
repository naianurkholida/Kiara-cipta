@extends('frontend.component.master')

<meta name="description" content="Promo Derma Express">
<link rel="canonical" href="https://derma-express.com/share/promo/{{$seo}}">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/share/promo/{{$seo}}" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Promo Apa Aja Nih yang Ada di Derma Express." />

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0px; padding-top: 10px;">
 
    <div class="container">
        <div class="container" id="container_dalem">
            <div class="row">
                <?php 
                $url = $_SERVER['REQUEST_URI'];
                $url = explode('/', $url);
                $url = $url[3];
                $url = explode('.', $url);
                $url = $url[1];
                ?>

                <?php if($url == 'jpg' || $url == 'png' || $url == 'jpeg'){ ?>

                    <img src="{{url('')}}/promosi/{{$seo}}" style="width: 100%;">

                <?php } else { ?>

                    <iframe style="border:0px #ffffff none;" width="100%" height="800px;" src="{{url('')}}/promo/{{$seo}}" scrolling="no" frameborder="1" allowfullscreen=""></iframe>

                <?php } ?>
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