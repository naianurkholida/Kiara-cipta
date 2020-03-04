
<section id="slider" style="height:450px !importnant;background-color:#f9f9f9;"
    class="slider-element slider-parallax swiper_wrapper full-screen clearfix" data-autoplay="7000" data-speed="650"
    data-loop="true">
    <div class="slider-parallax-inner" style="height:450px !importnant;">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">

                @foreach(Helper::slider() as $row)
                <div class="swiper-slide"
                    style="background-image: url( {{ $row->getFirstMediaUrl('slider') }} ); background-position: center top;">
                </div>
                @endforeach
          
        </div>
      </div>
    </div>
</section>
