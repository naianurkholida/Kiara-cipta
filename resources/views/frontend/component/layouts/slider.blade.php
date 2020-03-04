<!-- Slider
		============================================= -->
<<<<<<< HEAD
        <section id="slider" style="height:500px!importnant" class="slider-element slider-parallax swiper_wrapper full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="true">
=======
<section id="slider" style="height:450px !importnant;background-color:#f9f9f9;"
    class="slider-element slider-parallax swiper_wrapper full-screen clearfix" data-autoplay="7000" data-speed="650"
    data-loop="true">
>>>>>>> e85c4e0a466edf8522127921f9e7129fd43698d2

    <div class="slider-parallax-inner" style="height:450px !importnant;">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">

                @foreach(Helper::slider() as $row)
                <div class="swiper-slide"
                    style="background-image: url( {{ $row->getFirstMediaUrl('slider') }} ); background-position: center top;">
                </div>
                @endforeach

            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div class="slide-number">
                <div class="slide-number-current"></div><span>/</span>
                <div class="slide-number-total"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section>
<!-- #Slider End --> 
