<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px;background-color: #f9f9f9 !important;">
    <div class="container clearfix">
        <center>
            <h2>Our Treatments</h2>
        </center>
        <br><br>
        <div id="posts" class="post-grid grid-3 clearfix">
            @foreach(Helper::treatment() as $row)
                <div class="entry nobottomborder nobottompadding clearfix" id="treatment-item">
                    <div class="entry-box-shadow" style="background-color: #ffffff;    border: 4px solid #ddd;min-height: 400px;">
                        <a href="{{ $row->getFirstMediaUrl('treatment') }}" data-lightbox="image"></a>
                    <div class="entry-image nobottommargin" style="background-image: url('{{ $row->getFirstMediaUrl('treatment') }}');width: 100%;
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
                                <h2 style="padding: 10px;padding-left: 15px;padding-right: 15px;"><a href="{{ route('dermaster.treatments.show', $row->getTreatmentLanguage->seo) }}" style="color:#65b5aa;">{{ $row->getTreatmentLanguage->judul }}</a></h2>
                            </div>
                            <div class="entry-content clearfix" style="margin-top: 0 !important;">
                                <p class="nobottommargin" style="padding: 10px;padding-left: 15px;padding-right: 15px;">{{ Helper::removeTags($row->getTreatmentLanguage->deskripsi) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>