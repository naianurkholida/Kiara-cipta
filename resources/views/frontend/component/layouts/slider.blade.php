<<<<<<< HEAD
 <section id="slider" class="slider-element boxed-slider" style="padding-top:0px !important;">
    <div class="fslider" data-easing="easeInQuad">
      <div class="flexslider">
        <div class="slider-wrap">
          @foreach(Helper::slider() as $row)
            <div class="slide" data-thumb="{{ $row->getFirstMediaUrl('slider') }}">
              <a href="#">
                <div class="img-slider" style="background-image: url({{ $row->getFirstMediaUrl('slider') }});height:500px;width:100%;"></div>
              </a>
            </div>
          @endforeach
          <div class="slide" data-thumb="{{ asset('assets/images/blog/full/10.jpg') }}">
            <a href="#">
              <div class="img-slider" style="background-image: url({{ asset('assets/images/blog/full/10.jpg') }});height:500px;width:100%;"></div>
            </a>
          </div>
=======

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
          
>>>>>>> ef585836796da9f751c92b574286816530840b5b
        </div>
      </div>
    </div>
</section>
