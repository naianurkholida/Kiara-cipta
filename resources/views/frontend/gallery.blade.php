@extends('frontend.component.master')

@section('css')
    <style>
        
    </style>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix">
    <div class="container clearfix">

        <!-- Portfolio Filter
        ============================================= -->
        <ul class="portfolio-filter style-2 center clearfix" data-container="#portfolio" style="margin-left:25%;" id="boxmenu">

            <li class="activeFilter" id="menu-item-gallery"><a href="#" data-filter="*">Show All</a></li>
            @foreach($category as $row)
                <li id="menu-item-gallery"><a href="#" data-filter=".pf-{{ str_replace(' ', '-', $row->category) }}">{{ $row->category }}</a></li>
            @endforeach

        </ul>
        <!-- #portfolio-filter end -->
    </div>

    <!-- Portfolio Items
    ============================================= -->
    <div class="container">
        <div class="container">
            <div id="portfolio" class="portfolio grid-container portfolio-nomargin clearfix">

                @foreach($category as $row)
                    @if($row->category != "Profile")
                        @foreach($row->getGallery as $item)
                           
                                <article class="portfolio-item pf-media pf-{{ str_replace(' ', '-', $row->category) }}" style="border: 1px solid rgb(101, 181, 170);">
                                    <div class="portfolio-image">
                                        <a href="{{ $item->getFirstMediaUrl('gallery') }}" data-lightbox="gallery">
                                            <div id="item-gallery" style ="background-image:url({{ $item->getFirstMediaUrl('gallery') }})"></div>
                                            <div class="portfolio-overlay">
                                                <div class="portfolio-desc">
                                                    <h3>Open image<h3>
                                                </div>
                                            </div>    
                                        </a>
                                    </div>
                                </article>
                                
                        @endforeach
                    @endif
                @endforeach
        
            </div>
        </div>
    </div>
   
    <!-- #portfolio end -->
</div>
@endsection