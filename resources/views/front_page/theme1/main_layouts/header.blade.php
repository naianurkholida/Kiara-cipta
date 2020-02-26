<header id="header" class="clearfix static-sticky">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger">
                <i class="icon-reorder"></i>
            </div>

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="{{url('home')}}" class="standard-logo" data-dark-logo="images/mizan-panjang.png">
                    <img src="{{asset('themes/theme1/images/logo-laz-mizan-amanah.png')}}" alt="Canvas Logo" width="140px;" style="margin-top: 0px; margin-bottom: 20px;">
                </a>
                <a href="{{url('home')}}" class="retina-logo" data-dark-logo="images/mizan-panjang.png">
                    <img src="{{asset('themes/theme1/images/mizan-panjang.png')}}" alt="Canvas Logo">
                </a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
            ============================================= -->
            <form action="{{Route('front_page.switch_language')}}" method="post" id="switch_lang">
            {{ csrf_field() }}
                <nav id="primary-menu" class="d-lg-flex d-xl-flex justify-content-xl-between justify-content-lg-between fnone with-arrows">
                    <ul class="align-self-start">
                        <li><span class="menu-bg col-auto align-self-start d-flex"></span></li>
                        <!-- <li class="active"> -->
                        @foreach($header as $head)
                            <li>
                                <a href="{{Route('front_page.'.$head->url)}}">
                                    <div>{{$head->judul_menu}}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="not-dark align-self-end">
                    	<input type="hidden" id="lang" name="lang">
                    	<li>
                    		<a href="#" id="id" onclick="cek_lang_id()">
                                @if($language == 1 && $language != 2)
                                    <img src="{{asset('themes/theme1/images/id.png')}}" style="width:25px;">
                                @else
                    			    <img src="{{asset('themes/theme1/images/id.png')}}" style="width:25px; -webkit-filter:grayscale(100%); filter: grayscale(100%);">
                                @endif
                    		</a>
                    	</li>
                    	<li>
                    		<a href="#" id="en" onclick="cek_lang_en()">
                                @if($language == 2 && $language != 1)
                                    <img src="{{asset('themes/theme1/images/en.png')}}" style="width:25px;">
                                @else
                    			    <img src="{{asset('themes/theme1/images/en.png')}}" style="width:25px; -webkit-filter:grayscale(100%); filter: grayscale(100%);">
                                @endif
                    		</a>
                    	</li>
                    	<li>
                            @if(Session::get('id') != null)
                                @if(file_exists(asset("admin/assets/media/foto-users/245/session::get('foto')")))
                                    <a href="#"><img style="width: 30px; border-radius: 50%;" src="{{asset('admin/assets/media/foto-users/245')}}/{{session::get('foto')}}"><i class="icon-angle-down1"></i>
                                    </a>
                                @else
                                    <a href="#"><i class="icon-user-circle"></i><i class="icon-angle-down1"></i></a>
                                @endif
                            @else
                                <a href="#"><i class="icon-user-circle"></i><i class="icon-angle-down1"></i></a>
                            @endif
                    		<ul>
                    			@if(Session::get('id') != NULL)
                    			<li>
                    				<a href="{{Route('front_page.logout')}}">
                    					<div>@lang('language.keluar')</div>
                    				</a>
                                </li>
                                <li>
                                    <a href="{{Route('front_page.dash_donatur')}}">
                    					<div>Dashboard Donatur</div>
                    				</a>
                                </li>
                    			@else
                    			<li>
                                    <a href="{{Route('front_page.login')}}">
                                        <div>@lang('language.masuk')</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{Route('front_page.register')}}">
                                        <div>@lang('language.daftar_akun')</div>
                                    </a>
                                </li>
                    			@endif
                    		</ul>
                    	</li>
                    </ul>
                </nav><!-- #primary-menu end -->
            </form>
        </div>
    </div>
</header>
<script>
    function cek_lang_id(){
        // alert("id")
        $("#lang").val("id")
        $("#switch_lang").submit()
    }

    function cek_lang_en(){
        // alert("en")
        $("#lang").val("en")
        $("#switch_lang").submit()
    }
</script>