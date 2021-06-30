<div id="section-articles" class="section page-section nomargin bgcolor clearfix" style="padding-top: 100px;background-color: #f9f9f9 !important;">
    <div class="container clearfix">
        <center>
            <h2>
                Treatments
            </h2>
        </center>
        <br><br>
        <div id="posts" class="post-grid grid-3 clearfix">
            
            @foreach(Helper::treatmentPage() as $row)
            <div class="entry nobottomborder nobottompadding clearfix" id="treatment-item">
                <div class="entry-box-shadow"
                    style="background-color: #ffffff;    border: 4px solid #ddd;min-height: 400px;">
                    @foreach($row->getMedia('treatment') as $val)
                    <a href="{{ asset('assets/admin/assets/media/derma_treatment/500') }}/{{$val->image}}" data-lightbox="image">
                        <img src="{{ asset('assets/admin/assets/media/derma_treatment/500') }}/{{$row->image}}" alt="{{ $row->getTreatmentLanguage->judul }}">
                    </a>
                    @endforeach
                    <div class="entry-meta-wrapper">
                        <div class="entry-title clearfix">
                            <h2 style="padding: 10px;padding-left: 15px;padding-right: 15px;"><a
                                    href="{{ route('dermaster.treatments.show', $row->getTreatmentLanguage->seo) }}"
                                    style="color:#65b5aa;">{{ $row->getTreatmentLanguage->judul }}</a></h2>
                        </div>
                        <div class="entry-content clearfix" style="margin-top: 0 !important;">
                            <p class="nobottommargin" style="padding: 10px;padding-left: 15px;padding-right: 15px;">
                                {{ Helper::removeTags($row->getTreatmentLanguage->deskripsi) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
