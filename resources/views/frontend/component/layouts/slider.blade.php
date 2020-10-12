<div class="slider-container">
  <div id="slider-owl" class="owl-carousel owl-theme">
    @foreach(Helper::slider() as $key=>$row)
      <div class="item" data-hash="{{$key+1}}">
        <div class="img-slider" style="background-image: url({{ $row->getFirstMediaUrl('slider') }}); 
        background-color:{{$row->code_warna}};
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        height: 700px;
        width: 100%;">
        </div>
      </div>
    @endforeach
  </div>
  <div class="btn-container">
    @foreach(Helper::slider() as $key=>$row)
      <a class="btn-nav-slider" style="width: 75%;" href="#{{$key+1}}">{{$key+1}}</a>
    @endforeach
  </div>
</div>

