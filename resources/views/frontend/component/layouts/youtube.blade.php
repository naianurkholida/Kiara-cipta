<!-- youtube Feeds -->
<!-- <div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>Jurnal</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row align-items-center">
        @foreach(Helper::youtube() as $row)
            <div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
                <iframe width="100%" height="312" src="{{ $row->link }}" frameborder="0" allowfullscreen></iframe>
            </div>
        @endforeach
    </div>
</div> -->

<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px;background-color: #f9f9f9 !important;">
    <div class="container clearfix">
        <center>
            <h2>
             Jurnal
         </h2>
     </center>
     <br><br>
     <div id="posts" class="post-grid grid-3 clearfix">
        @foreach(Helper::posting() as $row)
        <div class="entry nobottomborder nobottompadding clearfix" id="treatment-item">
            <div class="entry-box-shadow" style="background-color: #ffffff;    border: 4px solid #ddd;min-height: 400px;">
                <a href="{{ $row->getFirstMediaUrl('posting') }}" data-lightbox="image"></a>
                <div class="entry-image nobottommargin" style="background-image: url('{{ $row->getFirstMediaUrl('posting') }}');width: 100%;
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
                <h2 style="padding: 10px;padding-left: 15px;padding-right: 15px;"><a href="{{ route('dermaster.jurnal.show', $row->getPostingLanguage->seo) }}" style="color:#65b5aa;">{{ $row->getPostingLanguage->judul }}</a></h2>
            </div>
            <div class="entry-content clearfix" style="margin-top: 0 !important;">
                <p class="nobottommargin" style="padding: 10px;padding-left: 15px;padding-right: 15px;">{{ Helper::removeTags($row->getPostingLanguage->content) }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
</div>
</div>