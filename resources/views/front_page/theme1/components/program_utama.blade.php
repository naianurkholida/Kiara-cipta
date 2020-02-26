
    <div class="container clearfix">

    </div>

    <div class="section mt-3" style="background: #FFF ;">
        <div class="container clearfix">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="mb-2">@lang('language.program_utama')</h3>
                    <div class="svg-line mb-2 clearfix">
                        <hr style="background-color: red; height: 1px; width: 200px; position: absolute;">
                    </div>
                    <p class="mb-5">@lang('language.program_utama_kategori')</p>
                    <div class="row missions-gloals">
                        @foreach($category as $cate)
                        <div class="col-md-6 mb-4">
                            <div class="feature-box fbox-plain d-flex bg-white">
                                <div class="fbox-media position-relative col-auto p-0 mr-4">
                                    <img src="{{asset('admin/assets/media/icon-kategori')}}/{{$cate->gambar}}" alt="Featured Icon 1"
                                        width="50">
                                </div>
                                <div class="fbox-desc">
                                    <h3 class="nott ls0"><a href="{{url('programs/pencarian?search_query_first=&search_query_last=')}}{{$cate->id}}" class="text-dark">{{$cate->category}}</a></h3>
                                    <p>{{$cate->deskripsi}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>