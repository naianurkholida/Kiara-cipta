@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">Gallery</h3>
        </div>

        <!-- Portfolio Filter
        ============================================= -->
        <ul class="portfolio-filter style-2 center clearfix" data-container="#portfolio" style="margin-left:25%;">

            <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
            @foreach($category as $row)
                <li><a href="#" data-filter=".pf-{{ str_replace(' ', '-', $row->category) }}">{{ $row->category }}</a></li>
            @endforeach

        </ul>
        <!-- #portfolio-filter end -->
    </div>

    <!-- Portfolio Items
    ============================================= -->
    <div id="portfolio" class="portfolio grid-container portfolio-nomargin clearfix">

        @foreach($category as $row)
                @foreach($row->getGallery as $item)
                    <article class="portfolio-item pf-media pf-{{ str_replace(' ', '-', $row->category) }}">
                        <div class="portfolio-image">
                                <div id="item-gallery" style ="background-image:url({{ $item->getFirstMediaUrl('gallery') }})"></div>
                            <div class="portfolio-overlay">
                                <div class="portfolio-desc">
                                    <h3><a href="{{ $item->getFirstMediaUrl('gallery') }}" target="blank">Open image</a><h3>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
        @endforeach

    </div>
    <!-- #portfolio end -->
</div>
@endsection