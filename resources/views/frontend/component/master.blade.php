<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
  <meta charset="utf-8"/>
  <meta name="description" content="Page with empty content">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Stylesheets
     ============================================= -->
     <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400i,700%7CMontserrat:300,400,500,600,700%7CMerriweather:300,400,300i,400i" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css" />
     <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" type="text/css" />
     <link rel="stylesheet" href="{{asset('assets/css/dark.css')}}" type="text/css" />
     <link rel="stylesheet" href="{{asset('assets/css/swiper.css')}}" type="text/css" />
     <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}" type="text/css" />


     <!-- shop Demo Specific Stylesheet -->
     <link rel="stylesheet" href="{{asset('assets/demos/shop/shop.css')}}" type="text/css" />
     <link rel="stylesheet" href="{{asset('assets/demos/shop/css/fonts.css')}}" type="text/css" />
     <!-- / -->

     <link rel="stylesheet" href="{{asset('assets/css/font-icons.css')}}" type="text/css" />
     <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" type="text/css" />
     <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" type="text/css" />

     <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" type="text/css" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />

     <link rel="stylesheet" href="{{asset('assets/css/colors.php?color=65b5aa')}}" type="text/css" />
     <link rel="shortcut icon" href="{{asset('assets/images/dermaexpress.png')}}">
    <!-- Document Title
     ============================================= -->
     <title>Home | Derma Express</title>
      @php
          $next = asset('assets/image/next.png');
          $prev = asset('assets/image/prev.png');
          $close = asset('assets/image/close.png');
      @endphp
      <style>
        .lb-nav a.lb-prev {
          background: url(<?= $prev ?>) left 48% no-repeat;
        }
        .lb-nav a.lb-next {
          background: url(<?= $next ?>) right 48% no-repeat;
        }
        .lb-data .lb-close {
          background: url(<?= $close ?>) top right no-repeat;
        }
      </style>
   </head>

   <body class="stretched">

    <!-- Document Wrapper
     ============================================= -->
     <div id="wrapper" class="clearfix">
      <!-- Login Modal -->
      <div class="modal1 mfp-hide" id="modal-register">
        <div class="card divcenter" style="max-width: 540px;">
          <div class="card-header py-3 nobg center">
            <h3 class="mb-0 t400">Hello, Welcome Back</h3>
          </div>
          <div class="card-body divcenter py-5" style="max-width: 70%;">

            <a href="#" class="button button-large btn-block si-colored si-facebook nott t400 ls0 center nomargin"><i class="icon-facebook-sign"></i> Log in with Facebook</a>

            <div class="divider divider-center"><span class="position-relative" style="top: -2px">OR</span></div>

            <form id="login-form" name="login-form" class="nobottommargin row" action="#" method="post">

              <div class="col-12">
                <input type="text" id="login-form-username" name="login-form-username" value="" class="form-control not-dark" placeholder="Username" />
              </div>

              <div class="col-12 mt-4">
                <input type="password" id="login-form-password" name="login-form-password" value="" class="form-control not-dark" placeholder="Password" />
              </div>

              <div class="col-12">
                <a href="#" class="fright text-dark t300 mt-2">Forgot Password?</a>
              </div>

              <div class="col-12 mt-4">
                <button class="button btn-block nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
              </div>
            </form>
          </div>
          <div class="card-footer py-4 center">
            <p class="mb-0">Don't have an account? <a href="#"><u>Sign up</u></a></p>
          </div>
        </div>
      </div>

        <!-- Top Bar
          ============================================= -->
          <div id="top-bar" class="dark" style="background-color: #a3a5a7;">

            <div class="container clearfix">

              <div class="row justify-content-between">

                <div class="col-lg-5 nobottommargin">


                </div>

                <div class="col-lg-7 d-none d-lg-flex justify-content-end">

                        <!-- Top Links
                          ============================================= -->
                          <div class="top-links">
                            <ul>
                              <li><a href="#">{{ Helper::baseLanguageName() }}</a>
                                <ul>
                                  @foreach(Helper::language() as $row)
                                  <li>
                                    <a href="{{ route('language.switch', $row->code) }}"><img src="{{ $row->getFirstMediaUrl('language') }}"> {{ $row->code }}</a> 
                                  </li>
                                  @endforeach
                                </ul>
                              </li>
                            </ul>
                          </div>
                          <!-- .top-links end -->

                        <!-- Top Social
                          ============================================= -->
                          <div id="top-social">
                            <ul>
                              <li><a href="{{ Helper::cfacebook() }}" class="si-facebook" target="_blank"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>

                              <li><a href="{{ Helper::cinstagram() }}" class="si-instagram" target="_blank"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>

                              <li><a href="{{ Helper::ctwitter() }}" class="si-twitter"><span class="ts-icon"><i class="icon-twitter"></i></span><span class="ts-text">Twitter</span></a></li>

                              <li><a href="{{ Helper::cwhatsapp() }}" target="_blank" rel="noopener" class="si-whatsapp"><span class="ts-icon"><i class="icon-whatsapp"></i></span><span class="ts-text">Whatsapp</span></a></li>

                              <li><a href="{{ Helper::cemail() }}" class="si-email3" target="_blank"><span class="ts-icon"><i class="icon-envelope-alt"></i></span><span class="ts-text">Email</span></a></li>
                            </ul>
                          </div>
                          <!-- #top-social end -->

                        </div>
                      </div>

                    </div>

                  </div>

        <!-- Header
          ============================================= -->
          @include('frontend.component.header')
          <!-- #header end -->

          @yield('content')
          
          
          <!-- end yt -->

          <div class="section topmargin nobottommargin nobottomborder" style="padding: 25px 0;margin: 0 !important; background-color: #f9f9f9 !important; ">
            <div class="container" id="footer-sosmed">
              <center>
                  <a href="{{ Helper::cfacebook() }}" class="fb-ic" style="padding:10px" id="sosmed-a"><span class="ts-icon" style="margin-right: 10px;" target="_blank"><i class="icon-facebook" ></i></span><span class="ts-text" style="margin-right: 10px;" id="text-sosmed">Facebook</span></a>

                  <a href="{{ Helper::cinstagram() }}" style="padding:10px" id="sosmed-a"><span class="ts-icon" style="margin-right: 10px;" target="_blank"><i class="icon-instagram2"></i></span><span class="ts-text" style="margin-right: 10px;" id="text-sosmed">Instagram</span></a>
  
                  <a href="{{ Helper::ctwitter() }}" style="padding:10px" id="sosmed-a"><span class="ts-icon" style="margin-right: 10px;" target="_blank"><i class="icon-twitter"></i></span><span class="ts-text" style="margin-right: 10px;" id="text-sosmed">Twitter</span></a>
                  
                  <a href="{{ Helper::cwhatsapp() }}" target="_blank" style="padding:10px" id="sosmed-a"><span class="ts-icon" style="margin-right: 10px;"><i class="icon-whatsapp"></i></span><span class="ts-text" style="margin-right: 10px;" id="text-sosmed">Whatsapp</span></a>

                  <a href="{{ Helper::cemail() }}" style="padding:10px" id="sosmed-a"><span class="ts-icon" style="margin-right: 10px;" target="_blank"><i class="icon-mail"></i></span><span class="ts-text" style="margin-right: 10px;" id="text-sosmed">Mail</span></a>
                </center>
            </div>
          </div>
        <!-- Footer
          ============================================= -->
          <footer id="footer" class="nobg noborder" style="background-color: #f9f9f9 !important;">



            <!-- Copyrights
             ============================================= -->
             <div id="copyrights" class="nobg">

              <div class="container clearfix">

                <div class="row justify-content-between align-items-center">
                  <div class="col-md-6">
                    <p>
                      SERPONG <br>
                      Gading Serpong <br>
                      Ruko Diamond III No 12-15, Jalan Gading Golf Boulevard, Gading Serpong, Pakulonan Bar., Kec. Klp. Dua, Kota Tangerang, Banten 15810
                    </p>
                    Copyrights &copy; 2020 DermaExpress<br>
                  </div>

                  <div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
                    <p>
                      UTAN KAYU <br>
                      Jl. Utan Kayu Raya No. 79B dan 79C RT 001/RW 08 <br>
                      No telp 02122896702 <br>
                      No telp 02122897879 <br>
                      No telp 02122895170 <br>
                    </p>
                  </div>
                </div>

              </div>

            </div>
            <!-- #copyrights end -->

          </footer>
          <!-- #footer end -->

        </div>
        <!-- #wrapper end -->

    <!-- Go To Top
     ============================================= -->
     <div id="gotoTop" class="icon-line-arrow-up"></div>

    <!-- External JavaScripts
     ============================================= -->
     <script src="{{asset('assets/js/jquery.js')}}"></script>
     <script src="{{asset('assets/js/plugins.js')}}"></script>
     <script src="{{asset('assets/js/lightbox.js')}}"></script>

    <!-- Footer Scripts
     ============================================= -->
     <script src="{{asset('assets/js/functions.js')}}"></script>

     <!-- ADD-ONS JS FILES -->
     <script>
      window.onscroll = function() {
        var slider = $('#slider');
        if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
          slider.addClass("scrolled-slider");
        } else {
          slider.removeClass("scrolled-slider");
        }
      }
    </script>

    <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e5ce427298c395d1ceaab3c/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
      })();
    </script>
     <script>
      if (window.matchMedia('(max-width: 425px)'))
     {
         $( "#header_dalem" ).removeClass("container");
         $( "#footer-sosmed" ).removeClass("container");
         $( "#header_luar" ).removeClass("container").addClass("container-fluid");
         $( "#header_detail" ).removeClass("container");
     } else {
         $( "#header_dalem" ).addClass("container");
         $( "#footer-sosmed" ).addClass("container");
         $( "#header_detail" ).addClass("container");
         $( "#header_luar" ).removeClass("container-fluid").addClass("container");
     }
    </script>
    @yield('js')

  </body>

  </html>