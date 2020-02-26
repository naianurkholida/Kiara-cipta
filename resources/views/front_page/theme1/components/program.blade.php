
<div class="section nobg mt-0 mb-4">
    <div class="container clearfix">
        <div class="row justify-content-center" style="margin-top: 100px">
            <div class="col-md-7 center">
                <div class="heading-block nobottomborder mb-4">
                    <h2 class="mb-4 nott">
                        @lang('language.program')
                    </h2>
                </div>
                <div class="svg-line bottommargin-sm clearfix">
                    <hr style="background-color: red; height: 1px; width: 200px;">
                </div>
                <p>
                    @lang('language.program_deskripsi')
                </p>
            </div>
        </div>
    </div>

    <div class="owl-carousel owl-carousel-full image-carousel carousel-widget topmargin-sm" data-stage-padding="20" data-margin="10" data-center="true" data-loop="true" data-nav="true" data-autoplay="500000" data-speed="400" data-pagi="true" data-items-xs="1" data-items-sm="2" data-items-md="2" data-items-lg="3" data-items-xl="4">

        @foreach($program_home as $prog)
        <?php 
        $total  = $prog->total;
        $target = $prog->dana_target;

        if ($target != null || $target != 0){
            $persen = $target/100;
            $hasil  = round($total/$persen);
            if($hasil > 100){
                $hasil = 100;
            }
        }else{
            $persen = 100;

            if($total != null || $total != 0){
                $hasil  = 100; 
            }else{
                $hasil = 0;
            }
        }

        ?>
        <div class="oc-item tleft">
            <div class="img-program" style="background-image: url('{{asset('admin/assets/media/foto-program')}}/{{$prog->foto}}'); width: 100%;" class="rounded">

            </div>
            <div class="oc-desc d-flex flex-column justify-content-center shadow-lg" style="width: 92%;">
                <small class="uppercase t400 ls1 color mb-2 d-block">
                    @lang('language.donasi')
                </small>
                <h3 class="mb-3">
                    <a href="#">
                        {{$prog->judul}}
                    </a>
                </h3>
                <ul class="skills mb-3">
                    <li data-percent="{{$hasil}}">
                        <div class="progress">
                            <!-- <div class="progress-percent">
                                <div class="counter counter-inherit">
                                    Rp. 
                                        <span data-from="0" data-to="{{$prog->total}}" data-refresh-interval="10" data-speed="1100" data-comma="true"></span> 
                                    Dari {{'Rp. '.number_format($prog->dana_target)}}
                                </div>
                            </div> -->
                        </div>
                    </li>
                </ul>
                @if($prog->dana_target != null)
                <h6>Terkumpul {{'Rp. '.number_format($prog->total)}} dari {{'Rp. '.number_format($prog->dana_target)}} ({{$hasil}}%)</h6>
                @else
                <h6>Terkumpul {{'Rp. '.number_format($prog->total)}} ({{$hasil}}%)</h6>
                @endif
                <p class="mb-4 text-black-50">
                    {{substr(strip_tags($prog->deskripsi), 0,100). ". . . ."}}
                </p>
                <a href="{{Route('program.donasi', $prog->seo)}}" class="button button-rounded button-border nott ls0 t500 m-0 d-flex align-self-start">
                    @lang('language.donasi')
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container clearfix">
    <div class="row justify-content-center">
       <!--  <a href="programpage.html" class="header-button" style="margin-top: 20px;">
            <div>Lihat Semua Program</div>
        </a> -->
    </div>
</div>