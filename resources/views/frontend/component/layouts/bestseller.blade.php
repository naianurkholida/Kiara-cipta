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
            <div class="img-bestseller" style="background-image: url({{ asset('assets/admin/assets/media/derma_produk') }}/{{$row->image}}); padding: 8px;" alt="{{ asset('assets/admin/assets/media/derma_produk') }}/{{$row->image}}">
                <p id="badge-product" style="
                    border-radius: 4px; 
                    background-color: #65b5aa; 
                    color: white;
                    padding: 8px;
                    width: fit-content;">
                    {{ $row->getCategory->category }}
                </p>
            </div>
            <div class="btn-bestseller"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: white; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
            <div class="overlay-bestseller">
                <div class="container-overlay">
                    <div>
                        <?php //$icon = Helper::iconProdukBestSeller($row->id); ?>
                        @foreach($row->getSpec as $val)
                        <img src="{{ asset('assets/admin/assets/media/derma_produk_spec') }}/{{ $val->icon }}" alt="" style="width: 50px;">
                        <span>{{ $val->specification }}</span>
                        <br><br>
                        @endforeach
                    </div>
                </div>
                <div class="btn-bestseller-overlay"><a href="{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}" style="color: rgb(16, 158, 158) ; text-align:center;">{{$row->getProdukLanguage->judul}}</a></div>
            </div>
        </div>
        @endforeach
    </div>
</div>