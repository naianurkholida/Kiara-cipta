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
            <li><a href="#" data-filter=".pf-icons">Icons</a></li>
            <li><a href="#" data-filter=".pf-illustrations">Illustrations</a></li>
            <li><a href="#" data-filter=".pf-uielements">UI Elements</a></li>
            <li><a href="#" data-filter=".pf-media">Media</a></li>
            <li><a href="#" data-filter=".pf-graphics">Graphics</a></li>

        </ul>
        <!-- #portfolio-filter end -->
    </div>

    <!-- Portfolio Items
    ============================================= -->
    <div id="portfolio" class="portfolio grid-container portfolio-nomargin clearfix">

        <article class="portfolio-item pf-media pf-icons">
            <div class="portfolio-image">
                <a href="#">
                    <img src="images/images/portfolio/1.jpg" alt="Open Imagination">
                </a>
                <div class="portfolio-overlay">
                    <div class="portfolio-desc">
                        <h3><a href="#">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </div>
            </div>
        </article>

        <article class="portfolio-item pf-illustrations">
            <div class="portfolio-image">
                <a href="#">
                    <img src="images/images/portfolio/2.jpg" alt="Open Imagination">
                </a>
                <div class="portfolio-overlay">
                    <div class="portfolio-desc">
                        <h3><a href="#">Locked Steel Gate</a></h3>
                        <span><a href="#">Illustrations</a></span>
                    </div>
                </div>
            </div>
        </article>

        <article class="portfolio-item pf-graphics pf-uielements">
            <div class="portfolio-image">
                <a href="#">
                    <img src="images/images/portfolio/3.jpg" alt="Open Imagination">
                </a>
                <div class="portfolio-overlay">
                    <div class="portfolio-desc">
                        <h3><a href="#">Mac Sunglasses</a></h3>
                        <span><a href="#">Graphics</a>, <a href="#">UI Elements</a></span>
                    </div>
                </div>
            </div>
        </article>

        <article class="portfolio-item pf-icons pf-illustrations">
            <div class="portfolio-image">
                <div class="fslider" data-arrows="false" data-speed="400" data-pause="4000">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <div class="slide">
                                <a href="#"><img src="images/images/portfolio/4.jpg" alt="Open Imagination"></a>
                            </div>
                            <div class="slide">
                                <a href="#"><img src="images/images/portfolio/4-2.jpg" alt="Open Imagination"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portfolio-overlay" data-lightbox="gallery">
                    <div class="portfolio-desc">
                        <h3><a href="#">Morning Dew</a></h3>
                        <span><a href="#">Icons</a>, <a href="#">Illustrations</a></span>
                    </div>
                </div>
            </div>
        </article>

        <article class="portfolio-item pf-graphics pf-illustrations">
            <div class="portfolio-image">
                <div class="fslider" data-arrows="false">
                    <div class="flexslider">
                        <div class="slider-wrap">
                            <div class="slide">
                                <a href="#"><img src="images/images/portfolio/5.jpg" alt="Open Imagination"></a>
                            </div>
                            <div class="slide">
                                <a href="#"><img src="images/images/portfolio/5-2.jpg" alt="Open Imagination"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portfolio-overlay" data-lightbox="gallery">
                    <div class="portfolio-desc">
                        <h3><a href="#">Shake It!</a></h3>
                        <span><a href="#">Illustrations</a>, <a href="#">Graphics</a></span>
                    </div>
                </div>
            </div>
        </article>

        <article class="portfolio-item pf-uielements pf-icons">
            <div class="portfolio-image">
                <a href="#">
                    <img src="images/images/portfolio/6.jpg" alt="Open Imagination">
                </a>
                <div class="portfolio-overlay">
                    <div class="portfolio-desc">
                        <h3><a href="#">Backpack Contents</a></h3>
                        <span><a href="#">UI Elements</a>, <a href="#">Icons</a></span>
                    </div>
                </div>
            </div>
        </article>

        <article class="portfolio-item pf-uielements pf-media">
            <div class="portfolio-image">
                <a href="#">
                    <img src="images/images/portfolio/7.jpg" alt="Open Imagination">
                </a>
                <div class="portfolio-overlay">
                    <div class="portfolio-desc">
                        <h3><a href="#">Console Activity</a></h3>
                        <span><a href="#">UI Elements</a>, <a href="#">Media</a></span>
                    </div>
                </div>
            </div>
        </article>

        <article class="portfolio-item pf-graphics">
            <div class="portfolio-image">
                <a href="#">
                    <img src="images/images/portfolio/8.jpg" alt="Open Imagination">
                </a>
                <div class="portfolio-overlay">
                    <div class="portfolio-desc">
                        <h3><a href="#">Sunset Bulb Glow</a></h3>
                        <span><a href="#">Graphics</a></span>
                    </div>
                </div>
            </div>
        </article>

    </div>
    <!-- #portfolio end -->
</div>
@endsection