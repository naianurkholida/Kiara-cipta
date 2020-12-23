<header id="header" class="full-header clearfix">

	<div id="header-wrap">
		<div class="container" id="header_luar">
			<div class="container" id="header_dalem">
				<div class="container" id="header_detail" style="display: flex; justify-content:center;">
                    <a href="{{ url('/') }}" class="mobile-logo"><img src="{{asset('assets/images/LogoDermaExpress-1@4x.png')}}" alt="DermaexpressLogo" width="100"></a>
                    
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo ============================================= -->
					
					<!-- #logo end -->

					<!-- Primary Navigation ============================================= -->
					<nav id="primary-menu" class="style-2 with-arrows">
                        <ul>
                            @foreach(Helper::MenuFrontPage() as $key => $row)
                                @if($key < 4)
                                    @if($row->url != "treatments" && $row->url != "products")
                                    <li class="menu-header">
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
                                                            <a  href="{{ url($row->url, $item->url) }}">
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
                                    <li class="menu-header" id="menu-hover">
                                        <a href="{{ Route('dermaster.treatments') }}">
                                            <div>{{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                                        </a>
                                       
                                    </li>
                                    <div class="menu-drop-new">
                                        <div class="scroller-detail">
                                            <?php foreach(Helper::treatment() as $key => $row){ ?>
                                                <div class="submenu" id="submenut{{$key}}">
                                                    <span>{{$row->getTreatmentLanguage->judul}}</span>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <?php foreach (Helper::treatment() as $key => $value) { ?>
                                            <div class="detail-submenu" id="detail-submenut{{$key}}">
                                                <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ $value->getFirstMediaUrl('treatment') }}); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                                                <div class="desc-detail">
                                                    <h2>
                                                    {{ $value->getTreatmentLanguage->judul }}
                                                    </h2>
                                                    {{ Helper::removeTags($value->getTreatmentLanguage->deskripsi) }}
                                                    <br>
                                                    <a href="{{ route('dermaster.treatments.show', $value->getTreatmentLanguage->seo) }}" class="btn-submenu">{{ $value->getTreatmentLanguage->judul }}</a>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    @else
                                    <li class="menu-header" id="menu-hover">
                                        <a href="{{ route('dermaster.'.$row->url) }}">
                                            <div>{{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                                        </a>
                                    </li>
                                    <div class="menu-drop-new">
                                        <div class="scroller-detail">
                                            <?php foreach(Helper::produkList() as $key => $row){ ?>
                                                <div class="submenu" id="submenu{{$key}}" value="{{$row->id}}">
                                                    <span>{{$row->getProdukLanguage->judul}}</span>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <?php foreach (Helper::produkList() as $key => $value) { ?>
                                            <div class="detail-submenu" id="detail-submenu{{$key}}">
                                                @foreach($value->getMedia('produk') as $row)
                                                <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ $row->getUrl() }}); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                                                @endforeach
                                                <div class="desc-detail">
                                                    <h2>
                                                    {{ $value->getProdukLanguage->judul }}
                                                    </h2>
                                                    {{ Helper::removeTags($value->getProdukLanguage->deskripsi) }}
                                                    <a href="{{ route('dermaster.products.show', $value->getProdukLanguage->seo) }}" class="btn-submenu" style="width: 100%;">{{ $value->getProdukLanguage->judul }}</a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    @endif
                                @endif
                            @endforeach 

                            <div id="logo" class="logo-desktop" style="border:0;padding: 0px !important;margin: 0px !important;">
                                <a href="{{ url('/') }}" class="standard-logo"><img src="{{asset('assets/images/LogoDermaExpress-1@4x.png')}}" alt="DermaexpressLogo"></a>
                                <a href="{{ url('/') }}" class="retina-logo"><img src="{{asset('assets/images/LogoDermaExpress-1@4x.png')}}" alt="DermaexpressLogo"></a>
                            </div>
                            @foreach(Helper::MenuFrontPage() as $key => $row)
                                @if($key > 3)
                                    @if($row->url != "treatments" && $row->url != "products")
                                    <li class="menu-header">
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
                                    <li class="menu-header header-treatment" id="menu-hover">
                                        <a href="{{ Route('dermaster.treatments') }}">
                                            <div>{{$row->getMenuFrontPageLanguage->judul_menu}}</div>
                                        </a>
                                       
                                    </li>
                                    <div class="menu-drop-new">
                                        <div class="scroller-detail">
                                            <?php foreach(Helper::treatment() as $key => $row){ ?>
                                                <div class="submenu" id="submenut{{$key}}">
                                                    <span>{{$row->getTreatmentLanguage->judul}}</span>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <?php foreach (Helper::treatment() as $key => $value) { ?>
                                            <div class="detail-submenu" id="detail-submenut{{$key}}">
                                                <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ $value->getFirstMediaUrl('treatment') }}); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                                                <div class="desc-detail">
                                                    <h2>
                                                    {{ $value->getTreatmentLanguage->judul }}
                                                    </h2>
                                                    {{ Helper::removeTags($value->getTreatmentLanguage->deskripsi) }}
                                                    <br>
                                                    <a href="{{ route('dermaster.treatments.show', $value->getTreatmentLanguage->seo) }}" class="btn-submenu">{{ $value->getTreatmentLanguage->judul }}</a>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    @else
                                    <li class="menu-header header-produk" id="menu-hover">
                                        <a href="{{ route('dermaster.'.$row->url) }}">
                                            <div>{{$row->getMenuFrontPageLanguage->judul_menu}} wkwkwk</div>
                                        </a>
                                       
                                    </li>
                                    <div class="menu-drop-new">
                                        <div class="scroller-detail">
                                            <?php foreach(Helper::produkList() as $key => $row){ ?>
                                                <div class="submenu" id="submenu{{$key}}">
                                                    <span>{{$row->getProdukLanguage->judul}}</span>
                                                </div>
                                            <?php } ?>
                                        </div>

                                        <?php foreach (Helper::produkList() as $key => $value) { ?>
                                            <div class="detail-submenu" id="detail-submenu{{$key}}">
                                                <div class="">
                                                    <div class="" id="">
                                                        <span>test judul</span>
                                                    </div>
                                                    <div class="" id="">
                                                        <span>test judul</span>
                                                    </div>
                                                    <div class="" id="">
                                                        <span>test judul</span>
                                                    </div>
                                                </div>

                                                @foreach($value->getMedia('produk') as $row)
                                                <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px;background-image: url({{ $row->getUrl() }}); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                                                @endforeach
                                                <div class="desc-detail">
                                                    <h2>
                                                    {{ $value->getProdukLanguage->judul }} test
                                                    </h2>
                                                    {{ Helper::removeTags($value->getProdukLanguage->deskripsi) }}
                                                    <br><br><br>
                                                    <a href="{{ route('dermaster.products.show', $value->getProdukLanguage->seo) }}" class="btn-submenu">{{ $value->getProdukLanguage->judul }}</a>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    @endif
                                @endif
                            @endforeach 
                        </ul> 

                        </nav>
                        <!-- #primary-menu end -->
                        
                    </div>
                </div>
            </div>
        </div>

    </header>
