@extends('frontend.component.master')

@section('header')
<meta name="description" content="Gallery Derma Express.">
<link rel="canonical" href="http://derma-express.com/gallery/show">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/gallery/show" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Suasana dan Perawatan Derma di Sini." />

<title>Derma Express - Gallery</title>

<style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 999; /* Sit on top */
  left: 0;
  top: 0;
  /* width: 100%; */
  /* height: 100%; */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: fit-content;
}
#modal_content {
  align-self: center;
  width: 100%;
  height: 315px;
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix">
    <div class="container clearfix container-gallery">

        <!-- Portfolio Filter
        ============================================= -->
        <div class="portfolio-filter style-2 center clearfix filter-box" data-container="#portfolio" id="boxmenu">

            <!-- <li class="activeFilter" id="menu-item-gallery"><a href="#" data-filter="*">Show All</a></li> -->
            @foreach($category as $row)
                @if($row->category != "Profile")
                    <li id="menu-item-gallery"><a href="#" data-filter=".pf-{{ str_replace(' ', '-', $row->category) }}">{{ $row->category }}</a></li>
                @endif
            @endforeach

        </div>
        <!-- #portfolio-filter end -->
    </div>

    <!-- Portfolio Items
    ============================================= -->
    <div class="container">
        <div class="container">
            <div id="portfolio" class="portfolio grid-container portfolio-nomargin clearfix">

                {{--@foreach($category as $row)--}}
                    {{--@if($row->category != "Profile")--}}
                        @foreach($data as $item)
                            @if($item->category->category != "Profile")
                                @php
                                    if ($item->image != null) {
                                        $type = "image";
                                        $url_asset = asset('assets/admin/assets/media/derma_gallery/') ."/". $item->image;
                                        $thumbnail = asset('assets/admin/assets/media/derma_gallery/') ."/". $item->image;
                                        $hover_text = "Open Image";
                                    } else {
                                        $type = "video";
                                        $url_asset = "https://www.youtube.com/embed/".explode("=",$item->embed)[1];
                                        $thumbnail = "https://img.youtube.com/vi/".explode("=",$item->embed)[1]."/mqdefault.jpg";
                                        $hover_text = "Watch Video";
                                    }
                                @endphp

                                <article class="portfolio-item pf-media pf-{{ str_replace(' ', '-', $item->category->category) }}" style="border: 1px solid rgb(101, 181, 170);">
                                    <div class="portfolio-image">
                                    @if($type == "image")
                                        <a href="{{ $url_asset }}" data-lightbox="gallery">
                                    @else
                                        <a onclick="open_modal('{{ $url_asset }}','{{ $type }}')">
                                    @endif
                                            <div id="item-gallery" style ="background-image:url({{ $thumbnail }})"></div>
                                            <div class="portfolio-overlay">
                                                <div class="portfolio-desc">
                                                    <h3>{{ $hover_text }}</h3>
                                                </div>
                                            </div>    
                                        </a>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    {{--@endif--}}
                {{--@endforeach--}}
        
            </div>
        </div>
    </div>
   
    <!-- #portfolio end -->

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <iframe id="modal_content" src=""></iframe>
    </div>

    </div>
</div>
@endsection

@section('js')
<script>
    var modal = document.getElementById("myModal");
    var modal_content_parent = document.getElementsByClassName("modal-content")[0];
    var modal_content = document.getElementById("modal_content");
    var span = document.getElementsByClassName("close")[0];

    function open_modal(url_asset, type) {
        if (type == "video")
            modal_content_parent.style.width = "50%";
        else
            modal_content_parent.style.width = "fit-content";

        modal.style.display = "block";
        modal_content.setAttribute("src", url_asset);
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
        modal_content.setAttribute("src", "");
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            modal_content.setAttribute("src", "");
        }
    }
</script>
@endsection