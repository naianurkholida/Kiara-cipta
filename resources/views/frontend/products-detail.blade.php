@extends('frontend.component.master')

@section('header')

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Product {{$data->getProdukLanguage->judul}} Derma Express">
<link rel="canonical" href="https://derma-express.com/products/show/{{$data->getProdukLanguage->seo}}">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/products/show/{{$data->getProdukLanguage->seo}}" />
<meta property="og:title" content="{{$data->getProdukLanguage->judul}}" />
<meta property="og:description" content="{{$data->getProdukLanguage->resume}}" />
<meta property="og:image" content="https://derma-express.com/assets/admin/assets/media/derma_produk/500/{{$data->image}}" />
<meta property="article:publisher" content="https://www.facebook.com/dermaxpress/" />
<meta property="article:tag" content="{{$data->getProdukLanguage->judul}}" />
<meta property="article:tag" content="Beauty" />
<meta property="article:tag" content="rekomendasi produk" />
<meta property="article:section" content="Beauty &amp; health" />

<title>{{$data->getProdukLanguage->judul}}</title>

<style>
    * {box-sizing: border-box;}

    .img-magnifier-container {
        position:relative;
    }

    .img-magnifier-glass {
        position: absolute;
        /* border: 3px solid #000; */
        border-radius: 0%;
        cursor: none;
        /*Set the size of the magnifier glass:*/
        width: 200px;
        height: 200px;
    }
</style>

<script>
    // Image Magnifier
    function magnify(imgID, zoom) {
        var img, glass, w, h, bw;
        img = document.getElementById(imgID);
        /*create magnifier glass:*/
        glass = document.createElement("DIV");
        glass.setAttribute("class", "img-magnifier-glass");
        /*insert magnifier glass:*/
        img.parentElement.insertBefore(glass, img);
        /*set background properties for the magnifier glass:*/
        glass.style.backgroundImage = "url('" + img.src + "')";
        glass.style.backgroundRepeat = "no-repeat";
        glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
        bw = 3;
        w = glass.offsetWidth / 2;
        h = glass.offsetHeight / 2;
        /*execute a function when someone moves the magnifier glass over the image:*/
        glass.addEventListener("mousemove", moveMagnifier);
        img.addEventListener("mousemove", moveMagnifier);
        /*and also for touch screens:*/
        glass.addEventListener("touchmove", moveMagnifier);
        img.addEventListener("touchmove", moveMagnifier);
        function moveMagnifier(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            x = pos.x;
            y = pos.y;
            /*prevent the magnifier glass from being positioned outside the image:*/
            if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
            if (x < w / zoom) {x = w / zoom;}
            if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
            if (y < h / zoom) {y = h / zoom;}
            /*set the position of the magnifier glass:*/
            glass.style.left = (x - w) + "px";
            glass.style.top = (y - h) + "px";
            /*display what the magnifier glass "sees":*/
            glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
        }
        function getCursorPos(e) {
            var a, x = 0, y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }
</script>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">{{$data->getProdukLanguage->judul}}</h3>
        </div>
    </div>
    <div class="container" id="container_luar">
        <div class="container" id="container_dalem">
            <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; padding-top: 0 !important">
                <div class="container" id="container_detail">
                    <div class="row" style="margin-top: 70px;">
                        <div class="col-md-4 col-sm-12">
                            <div class="img-magnifier-container">
                                <img class="img-home" id="img-home" width="100%" src="{{ asset('assets/admin/assets/media/derma_produk/') }}/{{$data->image}}" alt="{{$data->getProdukLanguage->judul}}" style="margin-bottom:20px;">
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            {!! $data->getProdukLanguage->deskripsi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(".img-magnifier-container").hover(function() {
        magnify("img-home", 2);
    }, function() {
        $(".img-magnifier-glass").remove();
    })

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