
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <h3 class="mb-2">
                @lang('language.update_artikel')
            </h3>
            <div class="svg-line mb-2 clearfix">
                <hr style="background-color: red; height: 1px; width: 250px; position: absolute;">
            </div>
            <p class="mb-5">
               @lang('language.update_artikel_deskripsi')
            </p>
            <div class="clear"></div>
            <a href="{{Route('update.detail', $posting[0]->seo)}}" class="shadow-sm d-flex align-items-center justify-content-center play-video rounded position-relative bg-color mt-3 clearfix" style="background: linear-gradient(rgba(0,0,0,.05), rgba(0,0,0,.01)), url('{{asset('admin/assets/media/posting/'.$posting[0]->image)}}') no-repeat center center / cover; height: 300px">
                
            </a>
            <div class="row mt-4" data-lightbox="gallery">
                <div class="col-sm-6">
                    <a href="{{Route('update.detail', $posting[1]->seo)}}" class="shadow-sm d-flex align-items-center justify-content-center play-video rounded position-relative bg-color left" style="background: url('{{asset('admin/assets/media/posting/'.$posting[1]->image)}}') no-repeat center center / cover; height: 140px">
                        
                    </a>
                </div>

                <div class="col-sm-6 mt-4 mt-sm-0">
                    <a href="{{Route('update.detail', $posting[2]->seo)}}" class="shadow-sm d-flex align-items-center justify-content-center play-video rounded position-relative bg-color left" style="background: url('{{asset('admin/assets/media/posting/'.$posting[2]->image)}}') no-repeat center center / cover; height: 140px">
                        
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="row missions-gloals">
                @foreach($posting as $post)
                <div class="col-md-12 mb-4">
                    <div class="feature-box fbox-plain d-flex bg-white">
                        <div class="fbox-media position-relative col-auto p-0 mr-4">
                            <img src="{{asset('admin/assets/media/posting/50/'.$post->image)}}" alt="Featured Icon 1" width="50">
                        </div>
                        <div class="fbox-desc">
                            <h3 class="nott ls0">
                                <a href="{{Route('update.detail', $post->seo)}}" class="text-dark">
                                    {{$post->judul}}
                                </a>
                            </h3>
                            <p>
                            {{substr(strip_tags($post->content), 0, 25)}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-12">

            
        </div>
    </div>
</div>