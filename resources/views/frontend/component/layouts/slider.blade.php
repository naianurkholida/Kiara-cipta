<div class="slider-container">
    <div id="slider-owl" class="owl-carousel owl-theme">
        <?php $code_warna = ''; ?>
        @foreach(Helper::slider() as $key=>$row)
        <?php 
        if($row->code_warna != null){ 
          $code_warna = $row->code_warna; 
        }else{ 
          $code_warna = "#dedede;";
        }?>
        <div class="item" data-hash="{{$key+1}}">
            <img src="{{ asset('assets/admin/assets/media/slider/500') }}/{{$row->image}}" alt="Derma Express">
            @if($row->link != null && $row->link != '-')
            <a href="{{ $row->link }}" class="btn btn-info button-slider" style="position: absolute; bottom: 50px; left: 39%; width: 300px; font-size: 25px;" target="blank">
                {{ $row->title_button }}
            </a>
            @endif
        </div>
        @endforeach
    </div>
    <div class="btn-container">
        @foreach(Helper::slider() as $key=>$row)
        <a class="btn-nav-slider" style="width: 75%;" href="#{{$key+1}}">{{$key+1}}</a>
        @endforeach
    </div>
</div>
