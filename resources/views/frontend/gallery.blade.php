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
                <li><a href="#" data-filter=".pf-{{ $row->category }}">{{ $row->category }}</a></li>
            @endforeach

        </ul>
        <!-- #portfolio-filter end -->
    </div>

    <!-- Portfolio Items
    ============================================= -->
    <div id="portfolio" class="portfolio grid-container portfolio-nomargin clearfix">

        @foreach($category as $row)
                @foreach($data as $item)
                    @if($item->id_category == $row->id)
                    <article class="portfolio-item pf-media pf-{{ $row->category }}">
                        <div class="portfolio-image">
                            <a href="#">
                                <img src="{{ $item->getFirstMediaUrl('gallery') }}" alt="Open Imagination">
                            </a>
                            <div class="portfolio-overlay">
                                <div class="portfolio-desc">
                                    <h3><a href="#">Open Imagination</a></h3>
                                    <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endif
                @endforeach
        @endforeach

    </div>
    <!-- #portfolio end -->
</div>
@endsection