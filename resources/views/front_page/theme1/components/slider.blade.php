    
    <section id="slider" class="slider-element dark swiper_wrapper full-screen force-full-screen slider-parallax clearfix">
        <div class="slider-parallax-inner">
            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">
                    @foreach($slider as $slide)
                    <div class="swiper-slide dark" style="background: linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.5)), url('{{asset('admin/assets/media/slider')}}/{{$slide->gambar}}') no-repeat center center; background-size: cover;">
                        <div class="container clearfix">
                            <div class="slider-caption">
                                <h2 class="nott" data-animate="fadeInUp">
                                    {{$slide->judul}}
                                </h2>
                                <p style="font-size: 17px;" data-animate="fadeInUp" data-delay="200">
                                    {{$slide->deskripsi}}
                                </p>
                                <a href="{{$slide->link}}" data-animate="fadeInUp" data-delay="400" class="button button-rounded button-large button-light text-light bgcolor shadow nott ls0 ml-0 mt-4">
                                    {{$slide->title_button}}
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-navs">
                    <div class="slider-arrow-left"><i class="icon-line-arrow-left"></i></div>
                    <div class="slider-arrow-right"><i class="icon-line-arrow-right"></i></div>
                </div>
                <div class="swiper-scrollbar">
                    <div class="swiper-scrollbar-drag">
                        <div class="slide-number">
                            <div class="slide-number-current">
                            </div>
                            <span>/</span>
                            <div class="slide-number-total">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>