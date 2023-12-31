<header id="header" class="full-header clearfix">

    <div id="header-wrap" style="height: 65px;">
        <div class="container" id="header_luar">
            <div class="container" id="header_dalem">
                <div class="container" id="header_detail" style="display: flex; justify-content:center;">
                    <a href="{{ url('/') }}" class="mobile-logo" style="top: 0px; left: 150px !important;">
                        <center><img src="{{ asset(Helper::logo_login()) }}" alt="DermaexpressLogo" width="100"></center>
                    </a>

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo ============================================= -->

                    <!-- #logo end -->

                    <!-- Primary Navigation ============================================= -->
                    <nav id="primary-menu" class="style-2 with-arrows">
                        <ul>
                            @foreach(Helper::MenuFrontPage() as $key => $row)
                            @if($key < 4) @if($row->url != "treatments" && $row->url != "products" && $row->url != "jurnal")
                                <li class="menu-header menu-non-hover">
                                    <a href="{{ route('dermaster.'.$row->url) }}">
                                        <div>{{ $row->getMenuFrontPageLanguage->judul_menu }}</div>
                                    </a>

                                    @if(count(Helper::childFrontPage($row->id)) != 0)
                                    <div class="mega-menu-content style-2 clearfix">
                                        <ul class="mega-menu-column col-lg-12">
                                            <li class="mega-menu-title" style="width: 100%;">
                                                <ul>
                                                    @foreach(Helper::childFrontPage($row->id) as $item)
                                                    <li style="width: 100%;">
                                                        <a href="{{ url($row->url, $item->url) }}">
                                                            <div>{{ Helper::getLanguageJudul($item->id) }}</div>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </li>
                                @elseif($row->url == "treatments" && $row->url != "products" && $row->url != "jurnal")
                                <li class="menu-header treatment" id="menu-hover">
                                    <a href="{{ Route('dermaster.treatments') }}">
                                        <div>{{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                                    </a>

                                </li>
                                <div class="menu-drop-new">
                                    <div class="scroller-detail">
                                        <?php foreach (Helper::treatment() as $key => $row) { ?>
                                            <div class="submenu" id="submenut{{$key}}">
                                                <span>{{$row->getTreatmentLanguage->judul}}</span>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <?php foreach (Helper::treatment() as $key => $value) { ?>
                                        <div class="detail-submenu" id="detail-submenut{{$key}}">
                                            <img src="{{asset('assets/admin/assets/media/derma_treatment/500') }}/{{$value->image}}" style="width: 50%;" alt="{{ asset('assets/admin/assets/media/derma_treatment/500') }}/{{$value->image}}">

                                            <div class="desc-detail text-center" style="font-size: 20px;width: 50% !important;">
                                                @if($value->getTreatmentLanguage->resume != null)
                                                <p>{{ $value->getTreatmentLanguage->resume }}</p>
                                                @else
                                                <p>{{ Helper::removeTags($value->getTreatmentLanguage->deskripsi) }}</p>
                                                @endif
                                                <br>
                                                <a href="{{ route('dermaster.treatments.show', $value->getTreatmentLanguage->seo) }}" class="btn-submenu" style="border-radius: 5px;">Selengkapnya</a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                                @elseif($row->url == "products" && $row->url != 'treatment' && $row->url != 'jurnal')
                                @php
                                $judul_menu = $row->getMenuFrontPageLanguage->judul_menu;
                                @endphp
                                <li class="menu-header produk prod-web" id="menu-hover">
                                    <a href="{{ route('dermaster.'.$row->url) }}">
                                        <div>{{ $judul_menu }}</div>
                                    </a>
                                </li>
                                <div class="menu-drop-new">
                                    <div class="scroller-detail">
                                        <?php foreach (Helper::produkList() as $key => $row) { ?>
                                            <?php // foreach(Helper::kategoriProdukList() as $key => $row){ 
                                            ?>
                                            <div class="submenu" id="submenu{{$key}}" value="{{$row->id}}" onclick="goToLink(`{{ route('dermaster.products.show', $row->getProdukLanguage->seo) }}`)">
                                                @if ($row->label != null && $row->label != "")
                                                <span class="badge badge-success">{{$row->label}}</span><br>
                                                @endif
                                                <span>{{$row->getProdukLanguage->judul}}</span>
                                                {{--
                                                            <span>{{$row->category}}</span>
                                                --}}
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <?php foreach (Helper::produkList() as $key => $value) { ?>
                                        <?php // foreach (Helper::kategoriProdukList() as $key => $value) { 
                                        ?>
                                        <div class="detail-submenu" id="detail-submenu{{$key}}">

                                            <img src="{{ asset('assets/admin/assets/media/derma_produk/500') }}/{{$value->banner}}" style="width: 50%;" alt="{{ asset('assets/admin/assets/media/derma_produk/500') }}/{{$value->banner}}">

                                            <div class="desc-detail text-center" style="font-size: 20px; width: 50% !important;">
                                                @if($value->getProdukLanguage->resume != null)
                                                <p>{{ $value->getProdukLanguage->resume }}</p>
                                                @else
                                                <p>{{ Helper::removeTags($value->getProdukLanguage->deskripsi) }}</p>
                                                @endif
                                                <a href="{{ route('dermaster.products.show', $value->getProdukLanguage->seo) }}" class="btn-submenu" style="width: 100%; border-radius: 5px;">Selengkapnya</a>

                                                {{--
                                                            <div style="margin:auto; width:50%;">
                                                                @if ($value->banner)
                                                                    <img src="{{asset('assets/admin/assets/media/icon-kategori')}}/{{$value->banner}}" alt="$value->category" width="100%">
                                                @endif
                                                <p>{{ $value->description ?? " " }}</p>
                                                <a href="{{ route('dermaster.products.category', $value->seo) }}" class="btn-submenu" style="width: 100%; border-radius: 5px;">Selengkapnya</a>
                                            </div>
                                            --}}
                                        </div>
                                </div>
                            <?php } ?>
                </div>
                <li class="prod-mobile">
                    <a href="#">
                        <div>{{ $judul_menu }}</div>
                    </a>

                    <div class="mega-menu-content style-2 clearfix">
                        <ul class="mega-menu-column col-lg-12">
                            <li class="mega-menu-title">
                                <ul style="display: none;">
                                    <li class="sub-menu" style="width: max-content !important;">
                                        <!--  <?php foreach (Helper::kategoriProdukList() as $key => $row) {
                                                ?>
                                                                    <a href="{{ route('dermaster.products.category', $row->seo) }}" class="sf-with-ul">{{$row->category}}</a>
                                                                <?php } ?> -->
                                        @foreach(Helper::produkList() as $item)
                                        <a href="{{ route('dermaster.products.show', $item->getProdukLanguage->seo) }}" class="sf-with-ul">{{ $item->getProdukLanguage->judul }}</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                @else
                <li class="menu-header jurnal" id="menu-hover">
                    <a href="{{ route('dermaster.'.$row->url) }}">
                        <div>{{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                    </a>
                </li>
                <div class="menu-drop-new">
                    <div class="scroller-detail">
                        <?php foreach (Helper::getJurnal() as $key => $row) { ?>
                            <a href="{{ route('dermaster.jurnal.show', $row->getPostingLanguage->seo) }}">
                                <div class="submenu" id="submenuts{{$key}}" value="{{$row->id}}">
                                    <span class="badge badge-success">{{$row->category->category}}</span><br>

                                    <span>{{$row->getPostingLanguage->judul}}</span>
                                </div>
                            </a>
                        <?php } ?>
                    </div>

                    <?php foreach (Helper::getJurnal() as $key => $value) { ?>
                        <div class="detail-submenu" id="detail-submenuts{{$key}}">

                            <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ asset('assets/admin/assets/media/posting/') }}/{{$value->image}}); background-size: contain;background-repeat: no-repeat;   background-position: center;" alt="{{ asset('assets/admin/assets/media/posting/') }}/{{$value->image}}"></div>

                            <div class="desc-detail">
                                <h2>
                                    {{ $value->getPostingLanguage->judul }}
                                </h2>
                                <a href="{{ route('dermaster.jurnal.show', $value->getPostingLanguage->seo) }}" class="btn-submenu" style="width: 100%; border-radius:5px">Selengkapnya</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                @endif
                @endif
                @endforeach

                <div id="logo" class="logo-desktop" style="border:0;padding: 0px !important;margin: 0px !important;">
                    <a href="{{ url('/home') }}" class="standard-logo">
                        <img src="{{ asset(Helper::logo_login()) }}" alt="DermaexpressLogo" style="height: 73px;">
                    </a>
                    <a href="{{ url('/home') }}" class="retina-logo">
                        <img src="{{ asset(Helper::logo_login()) }}" alt="DermaexpressLogo" style="height: 73px;">
                    </a>
                </div>

                @foreach(Helper::MenuFrontPage() as $key => $row)
                @if($key > 3)
                @if($row->url != "treatments" && $row->url != "products" && $row->url != 'jurnal')
                <li class="menu-header menu-non-hover">
                    <a href="{{ route('dermaster.'.$row->url) }}">
                        <div>{{ $row->getMenuFrontPageLanguage->judul_menu }}</div>
                    </a>

                    @if(count(Helper::childFrontPage($row->id)) != 0)
                    <div class="mega-menu-content style-2 clearfix">
                        <ul class="mega-menu-column col-lg-12">
                            <li class="mega-menu-title">
                                <ul>
                                    @foreach(Helper::childFrontPage($row->id) as $item)
                                    <li>
                                        <a href="{{ url($row->url, str_replace(' ', '-', Helper::getLanguageJudul($item->id))) }}">
                                            <div>{{ Helper::getLanguageJudul($item->id) }}</div>
                                        </a>
                                    </li>
                                    @endforeach

                                </ul>
                            </li>
                        </ul>
                    </div>
                    @endif
                </li>
                @elseif($row->url == "treatments" && $row->url != "products")
                <li class="menu-header treatment" id="menu-hover">
                    <a href="{{ Route('dermaster.treatments') }}">
                        <div>{{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                    </a>

                </li>
                <div class="menu-drop-new">
                    <div class="scroller-detail">
                        <?php foreach (Helper::treatment() as $key => $row) { ?>
                            <div class="submenu" id="submenut{{$key}}">
                                <span>{{$row->getTreatmentLanguage->judul}}</span>
                            </div>
                        <?php } ?>
                    </div>

                    <?php foreach (Helper::treatment() as $key => $value) { ?>
                        <div class="detail-submenu" id="detail-submenut{{$key}}">
                            <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ asset('assets/admin/assets/media/derma_treatment') }}/{{$value->image}}); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                            <div class="desc-detail text-center" style="font-size: 20px;">
                                @if($value->getTreatmentLanguage->resume != null)
                                <p>{{ $value->getTreatmentLanguage->resume }}</p>
                                @else
                                <p>{{ Helper::removeTags($value->getTreatmentLanguage->deskripsi) }}</p>
                                @endif
                                <br>
                                <a href="{{ route('dermaster.treatments.show', $value->getTreatmentLanguage->seo) }}" class="btn-submenu" style="border-radius: 5px;">Selengkapnya</a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                @elseif($row->url == 'products' && $row->url != "treatments")
                <li class="menu-header produk" id="menu-hover">
                    <a href="{{ route('dermaster.'.$row->url) }}">
                        <div> {{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                    </a>

                </li>
                <div class="menu-drop-new">
                    <div class="scroller-detail">
                        <?php foreach (Helper::produkList() as $key => $row) { ?>
                            <div class="submenu" id="submenu{{$key}}">
                                <span>{{$row->getProdukLanguage->judul}}</span>
                            </div>
                        <?php } ?>
                    </div>

                    <?php foreach (Helper::produkList() as $key => $value) { ?>
                        <div class="detail-submenu" id="detail-submenu{{$key}}">
                            <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ asset('assets/admin/assets/media/derma_produk/') }}/{{$value->banner}}); background-size: contain;background-repeat: no-repeat;   background-position: center;" alt="{{ asset('assets/admin/assets/media/derma_produk/500') }}/{{$value->banner}}"></div>
                            <div class="desc-detail text-center" style="font-size: 20px;">
                                @if($value->getProdukLanguage->resume != null)
                                <p>{{ $value->getProdukLanguage->resume }}</p>
                                @else
                                <p>{{ Helper::removeTags($value->getProdukLanguage->deskripsi) }}</p>
                                @endif
                                <br><br><br>
                                <a href="{{ route('dermaster.products.show', $value->getProdukLanguage->seo) }}" class="btn-submenu" style="border-radius: 5px;">Selengkapnya</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                @else
                <li class="menu-header jurnal" id="menu-hover">
                    <a href="{{ route('dermaster.'.$row->url) }}">
                        <div>{{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                    </a>
                </li>
                <div class="menu-drop-new">
                    <div class="scroller-detail">
                        <?php foreach (Helper::getJurnal() as $key => $row) { ?>
                            <div class="submenu" id="submenuts{{$key}}" value="{{$row->id}}">
                                <span class="badge badge-success">{{$row->category->category}}</span><br>
                                <span>{{$row->getPostingLanguage->judul}}</span>
                            </div>
                        <?php } ?>
                    </div>

                    <?php foreach (Helper::getJurnal() as $key => $value) { ?>
                        <div class="detail-submenu" id="detail-submenuts{{$key}}">

                            <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ asset('assets/admin/assets/media/posting/') }}/{{$value->image}}); background-size: contain;background-repeat: no-repeat;   background-position: center;" alt="{{ asset('assets/admin/assets/media/posting/') }}/{{$value->image}}"></div>

                            <div class="desc-detail">
                                <h2>
                                    {{ $value->getPostingLanguage->judul }}
                                </h2>
                                <a href="{{ route('dermaster.jurnal.show', $value->getPostingLanguage->seo) }}" class="btn-submenu" style="width: 100%;border-radius:5px">Selengkapnya</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                @endif
                @endif
                @endforeach

                <li class="sub-menu active">
                    <a href="#" class="sf-with-ul"><i class="icon-user-circle"></i><i class="icon-angle-down1"></i></a>
                    <ul>
                        @if(Session::get('customer_id') != null)
                        <li class="menu-header" style="width: auto;">
                            <a href="{{ url('dashboard-customer') }}">
                                Dashboard
                            </a>
                        </li>
                        @endif

                        <li class="menu-header" style="width: auto;">
                            @if(Session::get('customer_id') == null)
                            <a href="{{ url('/') }}">
                                Sign In
                            </a>
                            @else
                            <a href="{{ url('sign/logout') }}">
                                Logout
                            </a>
                            @endif
                        </li>
                    </ul>
                </li>

                </ul>
                </nav>

                <!-- #primary-menu end -->
            </div>
        </div>
    </div>
    </div>

</header>