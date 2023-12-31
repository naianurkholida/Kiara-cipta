<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
    <div class="container clearfix">
       <center>
        <h2>
            <!-- Best Seller -->
            Best Seller
        </h2>
    </center>
</div>
</div>
<div class="container" style="background-color: #ffffff; z-index: 9 !important;">
    <div class="box-bestseller">
        @foreach(Helper::produkListBestSeller() as $row)
        <div class="item-bestseller">
            <div class="img-bestseller" style="background-image: url({{ asset('assets/admin/assets/media/derma_produk/500') }}/{{$row->produk->image}}); padding: 8px;" alt="{{ $row->produk->getProdukLanguage->judul }}" class="lazyload">
                <p id="badge-product" style="
                border-radius: 4px; 
                background-color: #67b6ab; 
                color: white;
                padding: 8px;
                width: fit-content;">
                {{ $row->produk->getCategory->category }}
            </p>
        </div>
        <div class="btn-bestseller" style="border-radius: 8px;">
            <a href="{{ route('dermaster.products.show', $row->produk->getProdukLanguage->seo) }}" style="color: white; text-align:center;">{{$row->produk->getProdukLanguage->judul}}
            </a>
        </div>
        <div class="overlay-bestseller" style="border: 3px solid #67b6ab; background-color: rgb(0 128 128 / 95%);">
            <div class="container-overlay">
                <div>
                    <?php //$icon = Helper::iconProdukBestSeller($row->produk->id); ?>
                    @foreach($row->produk->getSpec as $val)
                    <img src="{{ asset('assets/admin/assets/media/derma_produk_spec') }}/{{ $val->icon_light }}" alt="" style="width: 15% !important; margin-left: 16%; margin-right: 15px;" class="lazyload">
                    <span>{{ $val->specification }}</span>
                    <br><br>
                    @endforeach
                </div>
            </div>
            <div class="btn-bestseller-overlay" style="border-radius: 8px;">
                <a href="{{ route('dermaster.products.show', $row->produk->getProdukLanguage->seo) }}" style="color: rgb(16, 158, 158) ; text-align:center;">{{$row->produk->getProdukLanguage->judul}}
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>