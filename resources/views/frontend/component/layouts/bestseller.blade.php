<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
    <div class="container clearfix">
       <center>
            <h2>
                Best Seller
            </h2>
        </center>
    </div>
</div>
<div class="container" style="background-color: #ffffff; z-index: 9 !important;">
    <div class="box-bestseller">
        @foreach(Helper::produkListBestSeller() as $row)
        <div class="item-bestseller">
            @foreach($row->getMedia('produk') as $val)
            <div class="img-bestseller" style="background-image: url({{ asset('assets/admin/assets/media/derma_produk') }}/{{$val->image}})" alt="{{ asset('assets/admin/assets/media/derma_produk') }}/{{$row->image}}"></div>
            @endforeach
            <div class="btn-bestseller"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: white; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
            <div class="overlay-bestseller">
                <div class="container-overlay">
                    <div>
                        <!-- <p style="margin-bottom:0px !important; margin-left:10px; font-size:20px">{{$row->getCategory->category}}</p><br> -->
                        <?php $icon = Helper::iconProdukBestSeller($row->id); ?>
                        @foreach($icon as $val)
                        <img src="{{ asset('assets/admin/assets/media/icons/') }}/{{ $val->icon }}" alt="" style="width: 50px;">
                        @endforeach
                    </div>
                </div>
                <div class="btn-bestseller-overlay"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: rgb(16, 158, 158) ; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
            </div>
        </div>
        @endforeach
    </div>
</div>