<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!--css include from main_layouts-->
    @include('front_page.theme1.main_layouts.css')
    <!--end css-->
    <title>Program Page | Mizan Amanah</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
    	============================================= -->
    	<div id="" class="clearfix">

    		<!-- Header ============================================= -->
    		@include('front_page.theme1.main_layouts.header')
    		<!-- #header end -->

        <!-- Content
        	============================================= -->
        	<section id="content" style="overflow: visible">
        		<div class="content-wrap p-0">
        			<div class="container clearfix">
        				<div class="row justify-content-center" style="margin-top: 50px;">
        					<div class="col-md-7 center">
        						<div class="heading-block nobottomborder mb-4">
        							<h2 class="mb-4 nott">Program</h2>
        						</div>
        						<div class="svg-line bottommargin-sm clearfix">
        							<hr style="background-color: red; height: 1px; width: 200px;">
        						</div>
        						<p style="font-weight: bold;">Daftar Program Mizan Amanah</p>
        					</div>
        				</div>
        			</div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="{{Route('program.cari')}}" method="get" id="search-post">
                                <div class="input-group divcenter">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="icon-line-search"></i></div>
                                    </div>
                                    <input type="text" name="search_query_first" class="form-control" value="{{$cari}}" placeholder="Pencarian" id="search">
                                    <select class="form-control" name="search_query_last" id="kategori">
                                        <option value="none" selected="" disabled="">- Kategori -</option>
                                        <?php 
                                        if($cate == "all"){
                                            $selectedall = 'selected="selected"';
                                        }else{
                                            $selectedall = '';
                                        }
                                        ?>
                                        <option value="all" <?= $selectedall ?> >All</option>
                                        @foreach($category_program as $cat)

                                        <?php 
                                        if($cate == $cat->id){ 
                                            $selected = 'selected="selected"'; 
                                        }else{ 
                                            $selected = ''; 
                                        }
                                        ?>

                                        <option value="{{$cat->id}}" <?= $selected ?> >{{$cat->category}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-danger" onclick="cek_search()">Cari</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-3">
                            <script type="text/javascript">
                                function cek_search(){
                                    var search = $('#search').val();
                                    var kategori = $('#kategori').val();

                                    if (search == null || kategori == null) {
                                        alert("Pencarian atau Kategori Harus di Isi");
                                    }else{
                                        $('#search-post').submit();
                                    }
                                }
                            </script>
                        </div>
                    </div>

                    <div class="container clearfix" style="margin-bottom: 150px;">
                        <?php $hasil =0; $persen=0; $date =""; $id_progam = ''; $total_capture= 0; $total = 0;?>
                        
                        @foreach($program as $prog)                        
                        <?php 
                        $total  = $prog->total;
                        $target = $prog->dana_target;

                        if ($target != null || $target != 0){
                            $persen = $target/100;
                            $hasil  = round($total/$persen);
                            if($hasil > 100){
                                $hasil = 100;
                            }
                        }else{
                            $persen = 100;

                            if($total != null || $total != 0){
                                $hasil  = 100; 
                            }else{
                                $hasil = 0;
                            }
                        }

                        $create = date_create($prog->tanggal);
                        $date = date_format($create, 'd F Y');
                        ?>
                        <div class="col-md-4" style="float: left;">
                            <div class="feature-box media-box">
                                <div class="fbox-media">
                                    <a href="{{Route('program.detailprogram', $prog->seo)}}">
                                        <div class="img-artikel" style="background-repeat: no-repeat; background-size: cover; width: 100%; height: 250px; background-image: url({{asset('admin/assets/media/foto-program/300')}}/{{$prog->foto}}); ">
                                        </div>
                                    </a>
                                </div>
                                <div class="fbox-desc">
                                    <div class="badge alert-danger">{{$prog->category}}</div>
                                    <a href="{{Route('program.detailprogram', $prog->seo)}}"><h4>{{$prog->judul}}</h4></a>
                                    <ul class="skills mb-3">
                                        <li data-percent="{{$hasil}}">
                                            <div class="progress">
                                                <!-- <div class="progress-percent">
                                                    <div class="counter counter-inherit">
                                                        Rp. <span data-from="0" data-comma="true" data-to="" data-refresh-interval="10" data-speed="1100"></span>
                                                    </div>                                                 
                                                </div> -->
                                            </div>
                                        </li>
                                    </ul> 
                                    @if($prog->dana_target != null)
                                    <h6>Terkumpul {{'Rp. '.number_format($prog->total)}} dari {{'Rp. '.number_format($prog->dana_target)}} ({{$hasil}}%)</h6>
                                    @else
                                    <h6>Terkumpul {{'Rp. '.number_format($prog->total)}} ({{$hasil}}%)</h6>
                                    @endif
                                    {{substr(strip_tags(str_replace('&nbsp;',' ',$prog->deskripsi)), 0,250). ". . . . . . . ."}}<br>
                                    <a href="{{Route('program.detailprogram', $prog->seo)}}" class="more-link">
                                        Read More
                                    </a><br><br><br>
                                    <div class="row">
                                        <div class="col-5">Batas Waktu</div>
                                        @if($prog->tanggal != null)
                                        <div class="col-6" style="text-align: right;"><b>{{$date}}</b></div>
                                        @else
                                        <div class="col-6" style="text-align: right;"><b>Tanpa Batas Waktu</b></div>
                                        @endif
                                    </div>
                                    <a href="{{Route('program.donasi', $prog->seo)}}" class="button btn-program">@lang('language.btn_donasi1')</a><br><br>
                                </div>

                            </div>
                        </div>
                        @endforeach

                        <div class="clear"></div>
                        <div class="row  justify-content-center"><br>
                            {{$program->links()}}
                        </div>
                    </div>

                </section>
            </div>
        </section><!-- #content end -->

    <!-- Footer
    	============================================= -->
    	<footer id="footer" style="background-color: #002D40;">

    		<div class="container">

            <!-- Footer Widgets
            	============================================= -->

            </div>
            @include('front_page.theme1.main_layouts.footer')
            @include('front_page.theme1.components.floating_contact')

        </footer>
    </div>

    <!-- Go To Top
    	============================================= -->
    	<div id="gotoTop" class="icon-angle-up"></div>
        <!--css include from main_layouts-->
        @include('front_page.theme1.main_layouts.js')
        <!--end css-->

        <script>
          jQuery(document).ready(function ($) {
             var elementParent = $('.floating-contact-wrap');
             $('.floating-contact-btn').off('click').on('click', function () {
                elementParent.toggleClass('active');
            });
         });

          var cal = $('#calendar').calendario({
             onDayClick: function ($el, $contentEl, dateProperties) {

                for (var key in dateProperties) {
                   console.log(key + ' = ' + dateProperties[key]);
               }

           },
           caldata: canvasEvents
       }),
          $month = $('#calendar-month').html(cal.getMonthName()),
          $year = $('#calendar-year').html(cal.getYear());

          $('#calendar-next').on('click', function () {
             cal.gotoNextMonth(updateMonthYear);
         });
          $('#calendar-prev').on('click', function () {
             cal.gotoPreviousMonth(updateMonthYear);
         });
          $('#calendar-current').on('click', function () {
             cal.gotoNow(updateMonthYear);
         });

          function updateMonthYear() {
             $month.html(cal.getMonthName());
             $year.html(cal.getYear());
         };

     </script>


 </body>

 </html>