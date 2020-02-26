@extends('frontend.component.master')

@section('content')
    <!-- Slider
		============================================= -->
        <section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="true">

            <div class="slider-parallax-inner">

                <div class="swiper-container swiper-parent">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide" style="background-image: url({{asset('assets/images/banner.png')}}); background-position: center top;">

                        </div>
                        <div class="swiper-slide" style="background-image: url({{asset('assets/images/banner.png')}}); background-position: center top;">

                        </div>
                        <div class="swiper-slide" style="background-image: url({{asset('assets/images/banner.png')}}); background-position: center top;">

                        </div>
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
        <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
            <div class="container clearfix">
                <div class="container clearfix">
                    <div class="heading-block center nomargin">
                        <h3>Selamat Datang di Dermaster Indonesia</h3>
                    </div>
                </div>
                <div class="row" style="margin-top: 70px;">
                    <div class="col-md-4 col-sm-12">
                        <div class="img-home" style="width: 100%; height: 300px; background-color: #f9f9f9; background-image: url({{asset('assets/images/dermaexpress.jpg')}}); background-size: cover; background-position: center;"></div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non accusamus odio minus quos error ab est officia repudiandae, eius excepturi obcaecati nam eveniet cupiditate distinctio necessitatibus officiis facilis sequi nihil! Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Non accusamus odio minus quos error ab est officia repudiandae, eius excepturi obcaecati nam eveniet cupiditate distinctio necessitatibus officiis facilis sequi nihil! Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Non accusamus odio minus quos error ab est officia repudiandae, eius excepturi obcaecati nam eveniet cupiditate distinctio necessitatibus officiis facilis sequi nihil! Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Non accusamus odio minus quos error ab est officia repudiandae, eius excepturi obcaecati nam eveniet cupiditate distinctio necessitatibus officiis facilis sequi nihil! Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Non accusamus odio minus quos error ab est officia repudiandae, eius excepturi obcaecati nam eveniet cupiditate distinctio necessitatibus officiis facilis sequi nihil! Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Non accusamus odio minus quos error ab est officia repudiandae, eius excepturi obcaecati nam eveniet cupiditate distinctio necessitatibus officiis facilis sequi nihil! Lorem ipsum, dolor sit amet
                            consectetur adipisicing elit. Non accusamus odio minus quos error ab est officia repudiandae, eius excepturi obcaecati nam eveniet cupiditate distinctio necessitatibus officiis facilis sequi nihil!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px;background-color: #f9f9f9 !important;">
            <div class="container clearfix">
                <center>
                    <h2>Our Treatments</h2>
                </center>
                <br><br>
                <div id="posts" class="post-grid grid-3 clearfix">
                    <div class="entry nobottomborder nobottompadding clearfix">
                        <div class="entry-box-shadow" style="background-color: #ffffff;    border: 4px solid #ddd;min-height: 400px;">
                            <a href="{{asset('assets/images/treatment/BOTOX RAHANG.png')}}" data-lightbox="image"></a>
                        <div class="entry-image nobottommargin" style="background-image: url('{{asset('assets/images/treatment/BOTOX RAHANG.png')}}');width: 100%;
                            height: 200px;
                            background-size: contain;
                            background-repeat:no-repeat;
                            background-position:center;
                            margin-top: 20px;
                            margin-bottom: 20px !important;">
                            </div>
                            </a>
                            <div class="entry-meta-wrapper">
                                <div class="entry-title clearfix">
                                    <h2 style="padding: 10px;padding-left: 15px;padding-right: 15px;"><a href="#" style="color:#65b5aa;">Acne and Scar</a></h2>
                                </div>
                                <div class="entry-content clearfix" style="margin-top: 0 !important;">
                                    <p class="nobottommargin" style="padding: 10px;padding-left: 15px;padding-right: 15px;">Acne atau jerawat adalah salah satu problem kulit yang paling banyak dikeluhkan. Hampir setiap orang pernah mengalaminya terutama pada masa pubertas.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry nobottomborder nobottompadding clearfix">
                        <div class="entry-box-shadow" style="background-color: #ffffff;    border: 4px solid #ddd;min-height: 400px;">
                            <a href="{{asset('assets/images/treatment/CLEAR CARE.png')}}" data-lightbox="image"></a>
                            <div class="entry-image nobottommargin" style="background-image: url('{{asset('assets/images/treatment/CLEAR CARE.png')}}');width: 100%;
                            height: 200px;
                            background-size: contain;
                            background-repeat:no-repeat;
                            background-position:center;
                            margin-top: 20px;
                            margin-bottom: 20px !important;">
                            </div>
                            </a>
                            <div class="entry-meta-wrapper">
                                <div class="entry-title clearfix">
                                    <h2 style="padding: 10px;padding-left: 15px;padding-right: 15px;"><a href="#" style="color:#65b5aa;">Attiva Lift</a></h2>
                                </div>
                                <div class="entry-content clearfix" style="margin-top: 0 !important;">
                                    <p class="nobottommargin" style="padding: 10px;padding-left: 15px;padding-right: 15px;">ATTIVA, suatu generasi radiofrekuensi terbaru yang berinovasi, radiofrekuensi endodermal dengan kamera termografik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="entry nobottomborder nobottompadding clearfix">
                        <div class="entry-box-shadow" style="background-color: #ffffff;    border: 4px solid #ddd;min-height: 400px;">
                            <a href="{{asset('assets/images/treatment/FACIAL ACCUPRESSURE & MASSAGE.png')}}" data-lightbox="image"></a>
                            <div class="entry-image nobottommargin" style="background-image: url('{{asset('assets/images/treatment/FACIAL ACCUPRESSURE & MASSAGE.png')}}');width: 100%;
                            height: 200px;
                            background-size: contain;
                            background-repeat:no-repeat;
                            background-position:center;
                            margin-top: 20px;
                            margin-bottom: 20px !important;">
                            </div>
                            </a>
                            <div class="entry-meta-wrapper">
                                <div class="entry-title clearfix">
                                    <h2 style="padding: 10px;padding-left: 15px;padding-right: 15px;"><a href="#" style="color:#65b5aa;">Tarik Benang Aptos</a></h2>
                                </div>
                                <div class="entry-content clearfix" style="margin-top: 0 !important;">
                                    <p class="nobottommargin" style="padding: 10px;padding-left: 15px;padding-right: 15px;">Tarik Benang APTOS untuk membuat wajah tampak lebih V shape dan kencang Aptos Thread telah mendapatkan penghargaan internasional Best Tightening Thread.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Instagram Feeds -->
        <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
            <div class="container clearfix">
                <div class="heading-block center nomargin">
                    <h3>Instagram Feeds</h3>
                </div>
            </div>
        </div>
        <div class="container" style="background-color: #ffffff; z-index: 9 !important;">
            <div id="portfolio" class="portfolio portfolio-nomargin grid-container portfolio-notitle portfolio-full grid-container clearfix">

                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="{{asset('assets/images/portfolio/4/1.jpg')}}" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="{{asset('assets/images/portfolio/full/1.jpg')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="{{asset('assets/images/portfolio/4/1.jpg')}}" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="{{asset('assets/images/portfolio/full/1.jpg')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="{{asset('assets/images/portfolio/4/1.jpg')}}" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="{{asset('assets/images/portfolio/full/1.jpg')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="{{asset('assets/images/portfolio/4/1.jpg')}}" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="{{asset('assets/images/portfolio/full/1.jpg')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="{{asset('assets/images/portfolio/4/1.jpg')}}" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="{{asset('assets/images/portfolio/full/1.jpg')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="{{asset('assets/images/portfolio/4/1.jpg')}}" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="{{asset('assets/images/portfolio/full/1.jpg')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="{{asset('assets/images/portfolio/4/1.jpg')}}" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="{{asset('assets/images/portfolio/full/1.jpg')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                <article class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.html">
                            <img src="{{asset('assets/images/portfolio/4/1.jpg')}}" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="{{asset('assets/images/portfolio/full/1.jpg')}}" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
                            <a href="portfolio-single.html" class="right-icon"><i class="icon-line-ellipsis"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.html">Open Imagination</a></h3>
                        <span><a href="#">Media</a>, <a href="#">Icons</a></span>
                    </div>
                </article>

                

            </div>
            <a href="" style="background-color: #ffffff; z-index: 9 !important;">
                <div class="btn-load-more">Load more post...</div>
            </a>
        </div>

        <!-- end instagram -->
        <!-- Instagram Feeds -->
        <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
            <div class="container clearfix">
                <div class="heading-block center nomargin">
                    <h3>Youtube Channel</h3>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
                    <iframe width="100%" height="312" src="https://www.youtube.com/embed/3xnYNlNAoSo" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
                    <iframe width="100%" height="312" src="https://www.youtube.com/embed/3xnYNlNAoSo" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
                    <iframe width="100%" height="312" src="https://www.youtube.com/embed/3xnYNlNAoSo" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
                    <iframe width="100%" height="312" src="https://www.youtube.com/embed/3xnYNlNAoSo" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
@endsection