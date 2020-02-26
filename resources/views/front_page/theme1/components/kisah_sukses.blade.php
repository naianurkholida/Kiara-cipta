
<div class="container">
    <div class="container clearfix">
        <div class="row justify-content-center" style="margin-top: 100px">
            <div class="col-md-7 center">
                <div class="heading-block nobottomborder mb-4">
                    <h2 class="mb-4 nott">
                        @lang('language.kisah_sukses')
                    </h2>
                </div>
                <div class="svg-line bottommargin-sm clearfix">
                    <hr style="background-color: red; height: 1px; width: 250px;">
                </div>
                <p>
                    @lang('language.kisah_sukses_deskripsi')
                </p>
            </div>
        </div>
    </div>
    <div id="oc-posts" class="owl-carousel posts-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">
        @foreach($kisah_sukses as $kisah)
        <div class="oc-item">
            <div class="ipost clearfix">
                <div class="entry-image">
                    <a href="{{asset('admin/assets/media/posting/245')}}/{{$kisah->image}}" data-lightbox="image">
                        <div class="img-artikel" style="background-repeat: no-repeat; background-size: cover; width: 100%; height: 250px; background-image: url({{asset('admin/assets/media/posting/245')}}/{{$kisah->image}}); ">
                        </div>
                    </a>
                </div>
                <div class="entry-title">
                    <h3>
                        <a href="{{Route('home.kisah',$kisah->seo)}}">
                            {{$kisah->judul}}
                        </a>
                    </h3>
                </div>
                <div class="entry-content">
                    <p>
                        {!! $kisah->content !!}
                    </p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="clearfix"></div><br><br>
    <div class="youtube-responsive">
        <div class="youtube-player" data-id="{{$links}}" style="width: 100%"></div>
    </div>
</div>