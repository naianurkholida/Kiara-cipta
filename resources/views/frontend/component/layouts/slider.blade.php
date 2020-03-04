<<<<<<< HEAD
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

=======
 <section id="slider" class="slider-element boxed-slider" style="padding-top:0px !important;">
    <div class="fslider" data-easing="easeInQuad">
      <div class="flexslider">
        <div class="slider-wrap">
          @foreach(Helper::slider() as $row)
            <div class="slide" data-thumb="{{ $row->getFirstMediaUrl('slider') }}">
              <a href="#">
                <div class="img-slider" style="background-image: url({{ $row->getFirstMediaUrl('slider') }});height:500px;width:100%;"></div>
              </a>
>>>>>>> d5839a89c299170ea226b0406ae90079b4de5118
            </div>
          @endforeach
          
        </div>
      </div>
    </div>
</section>
