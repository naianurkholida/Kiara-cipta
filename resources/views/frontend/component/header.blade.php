<header id="header" class="full-header clearfix">

	<div id="header-wrap">
		<div class="container" id="header_luar">
			<div class="container" id="header_dalem">
				<div class="container" id="header_detail" style="display: flex; justify-content:center;">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo ============================================= -->
					<div id="logo" style="border:0;">
						<a href="" class="standard-logo"><img src="{{asset('assets/images/dermaexpress.png')}}" alt="DermaexpressLogo"></a>
						<a href="" class="retina-logo"><img src="{{asset('assets/images/dermaexpress.png')}}" alt="DermaexpressLogo"></a>
					</div>
					<!-- #logo end -->

					<!-- Primary Navigation ============================================= -->
					<nav id="primary-menu" class="style-2 with-arrows">
                        <ul>
                            @foreach(Helper::MenuFrontPage() as $row)
                            @if($row->url != "treatments")
                            <li>
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
                            @else
                            <!-- <li>
                                <?php if(\Config::get('app.locale') != 'id'){?>
                                    <li class="sub-menu"><a href="" class="sf-with-ul"><div>Treatments</div></a>
                                        <ul style="display: none;">
                                            <li class="sub-menu">
                                                <a href="{{route('dermaster.treatments', '48')}}" class="sf-with-ul">BOTOX</a>
                                                <a href="{{route('dermaster.treatments', '49')}}" class="sf-with-ul">Meso DNA Salmon</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php }else{?>
                                    <li class="sub-menu"><a href="" class="sf-with-ul"><div>Perawatan</div></a>
                                        <ul style="display: none;">
                                            <li class="sub-menu">
                                                <a href="{{route('dermaster.treatments', '48')}}" class="sf-with-ul">BOTOX</a>
                                                <a href="{{route('dermaster.treatments', '49')}}" class="sf-with-ul">Meso DNA Salmon</a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php }?>
                            </li> -->

                            <li>
                                <a href="#">
                                    <div>{{ $row->getMenuFrontPageLanguage->judul_menu }}</div>
                                </a>
                                @if(count(Helper::childFrontPage($row->id)) != 0)
                                <div class="mega-menu-content style-2 clearfix">
                                    <ul class="mega-menu-column col-lg-12">
                                        <li class="mega-menu-title">
                                            <ul style="display: none;">
                                                @foreach(Helper::childFrontPage($row->id) as $item)
                                                <li>
                                                    <a href="{{ route('dermaster.treatments', $item->url) }}">
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
