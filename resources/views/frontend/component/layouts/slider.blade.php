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
          
        </div>
      </div>
    </div>
</section>
