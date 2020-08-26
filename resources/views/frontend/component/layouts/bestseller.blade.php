<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>BEST SELLER</h3>
        </div>
    </div>
</div>
<div class="container" style="background-color: #ffffff; z-index: 9 !important;">
    <div class="box-bestseller">
        @foreach(Helper::produkListBestSeller() as $row)
        <div class="item-bestseller">
            @foreach($row->getMedia('produk') as $val)
            <div class="img-bestseller" style="background-image: url({{ $val->getUrl() }})"></div>
            @endforeach
            <div class="desc-bestseller">
                <h3>{{$row->getProdukLanguage->judul}}</h3>
                <p >{{Helper::removeTags($row->getProdukLanguage->deskripsi)}}</p>
            </div>
            <div class="btn-bestseller"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: white; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
            <div class="overlay-bestseller">
                <div class="container-overlay">
                    <div class="item-dalem">
                        @foreach($row->getMedia('produk') as $val)
                        <img src="{{ $val->getUrl() }}" alt="" style="width: 30px">
                        @endforeach
                        <p style="margin-bottom:0px !important; margin-left:10px; font-size:20px">{{$row->getCategory->category}}</p>
                    </div>
                </div>
                <div class="btn-bestseller-overlay"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: rgb(16, 158, 158) ; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
            </div>
        </div>
        @endforeach
    </div>
</div>