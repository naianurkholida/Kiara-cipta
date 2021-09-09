@extends('frontend.component.master_product_and_treatment')

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

<title>Derma Express - {{$data->getProdukLanguage->judul}}</title>

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

    table {
        border-collapse: collapse;
        width: 100%;
    }
    table td, table th {
        border: 1px solid #c4cdd5;
    }
    table tr:first-child td {
        border-top: 0;
    }
    table tr:last-child td {
        border-bottom: 0;
    }
    table tr td:first-child,
    table tr th:first-child {
        border-left: 0;
    }
    table tr td:last-child,
    table tr th:last-child {
        border-right: 0;
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
    <div class="container" id="container_luar">
        <div class="container" id="container_dalem">
            <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; padding-top: 0 !important">
            	<div class="container" id="container_detail">
            		<div class="row">
            			<div class="col-lg-6 col-sm-12" style="border-radius: 5px; margin-bottom: 10px;">
            				<div class="img-magnifier-container">
            					<img class="img-home" id="img-home" width="100%" src="{{ asset('assets/admin/assets/media/derma_produk/') }}/{{$data->image}}" alt="{{$data->getProdukLanguage->judul}}">
            				</div>
            			</div>

            			<div class="col-lg-6 col-sm-12" style="font-size: 18px;">
            				<h3 class="nott ls0">{{$data->getProdukLanguage->judul}}</h3><br>
            				<span style="font-size: 25px; font-weight: bold; font-family: ui-monospace; margin-bottom: 10px;">
                                @if($data->harga != 0)
                                    Rp. {{ number_format($data->harga) }}
                                @endif
                            </span><br><br>
                            
                            {!! $data->getProdukLanguage->deskripsi !!}

                            <hr>

                            <table class="detail-spec-web" style="text-align: center; background-color: #92cac3; border-radius: 7px;">
                            @foreach($data->getSpec as $key => $val)
                                @if(($key % 2) == 0)
                                <tr>
                                @endif
                                    @if($key == (count($data->getSpec)-1))
                                    <td width="50%" colspan="2">
                                    @else
                                    <td width="50%">
                                    @endif
                                        <img src="{{ asset('assets/admin/assets/media/derma_produk_spec') }}/{{ $val->icon_dark }}" alt="" style="width: 30px; margin: 16px 30px 22px 24px;">
                                        <span style="color: white; font-size: 15px; font-family: ui-sans-serif;">{{$val->specification}}</span>
                                    </td>
                                @if(($key % 2) != 0 || $key == (count($data->getSpec)-1))
                                </tr>
                                @endif
                            @endforeach
                            </table>

                            <table class="detail-spec-mobile" style="background-color: #92cac3; border-radius: 7px;">
                            @foreach($data->getSpec as $key => $val)
                                <tr>
                                    <td align="center">
                                        <img src="{{ asset('assets/admin/assets/media/derma_produk_spec') }}/{{ $val->icon_dark }}" alt="" style="width: 30px; margin: 16px 30px 22px 24px;">
                                    </td>
                                    <td align="center" style="color: white; font-size: 15px; font-family: ui-sans-serif;">
                                        <span>{{$val->specification}}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </table>

                            <a href="https://wa.me/+6282260030880/?text=Pesanan Kamu {{$data->getProdukLanguage->judul}}, Silahkan melakukan proses check out." class="btn btn-info" style="background-color: rgb(16, 158, 158); width: 100%;" target="_blank">Miliki Sekarang</a>
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