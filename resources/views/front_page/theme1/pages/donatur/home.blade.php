<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css--> 
	<title>Dashboard Donatur | Mizan Amanah</title>
</head>

<body class="stretched">

    <!-- Document Wrapper
    	============================================= -->
    	<div id="" class="clearfix">

        <!-- Header
        	============================================= -->
        	@include('front_page.theme1.main_layouts.header')
        	<!-- #header end -->



        <!-- Content
        	============================================= -->
        	<section id="content" style="overflow: visible">

        		<div class="content-wrap">
        			<div class="container clearfix">
        				<div class="row clearfix">

        					<div class="col-12">
                                @if(Session::get('foto') != null)
                                    @if(file_exists(asset("admin/assets/media/foto-users/245/session::get('foto')")))
                                        <img src="{{asset('admin/assets/media/foto-users/245')}}/{{session::get('foto')}}"
                                        style="width: 60px; height: 60px; border-radius: 50px;">
                                    @else
                                        <img src="{{asset('admin/assets/media/icons/icon-people.png')}}"
                                        style="width: 60px; height: 60px; border-radius: 50px;">
                                    @endif
                                @else
                                    <img src="{{asset('admin/assets/media/icons/icon-people.png')}}"
                                        style="width: 60px; height: 60px; border-radius: 50px;">
                                @endif
        						<div class="heading-block noborder">
        							<h3>{{$user->name}}</h3>
        							<span>
        								<p style="font-size: 12px;"> {{$user->alamat}} </p>
        							</span>
        						</div>
        						<div class="clear"></div>
        						<div class="row clearfix">
        							<div class="col-lg-12">
        								<div class="tabs tabs-alt clearfix" id="tabs-profile">

        									<ul class="tab-nav clearfix">
        										<li><a href="#tab-feeds">Feeds</a></li>
        										<li><a href="#tab-posts">History Donasi</a></li>
        										<li><a href="#tab-post">History Zakat</a></li>
        										<li><a href="#tab-profile"><i class="icon-pencil2"></i>@lang('language.profile')</a></li>
        										<li><a href="#tab-password"><i class="icon-pencil2"></i>@lang('language.ganti_password')</a></li>
        									</ul>

        									<div class="tab-container">
        										<div class="tab-content clearfix" id="tab-feeds">
        											<p class="">
        												{{$user->bio}}
        												<br>
        												Email : {{$user->email}}
        												<br>
        												Phone : {{$user->no_telp}}
        											</p>

        											<table class="table table-bordered" style="text-align: center;">
        												<thead>
        													<tr>
        														<th>{{$count_history_donatur}}</th>
        														@if($total_donasi != null)
        														<th>{{'Rp. '.number_format($total_donasi->total)}}</th>
        														@else
        														<th>Rp. 0</th>
        														@endif
        													</tr>
        												</thead>
        												<tbody>
        													<tr>
        														<td>Program</td>
        														<td>Total Donasi</td>
        													</tr>
        												</tbody>
        											</table>
        										</div>

        										<div class="tab-content clearfix" id="tab-posts">
        											<div class="row justify-content-center">
        												<h3>Histori Donasi Anda</h3>
        											</div>
        											<div class="row">
        												<?php $no =1;?>
        												@foreach($history_donatur as $history)
        												<div class="col-md-4 col-sm-12">
        													<div class="card">
        														<div class="card-body">
        															<table>
        																<tr>
        																	<th>Nama Program</th>
        																	<td>:</td>
        																	<td style="padding-left:10px;">{{$history->judul}}</td>
        																</tr>
        																<tr>
        																	<th>Nominal</th>
        																	<td>:</td>
        																	<td style="padding-left:10px;">{{'Rp. '.number_format($history->total)}}</td>
        																</tr>
        															</table>
        														</div>
        														<div class="card-footer">
        															{{$history->tanggal}}
        														</div>
        													</div>
        												</div>
        												@endforeach
        											</div><br><br>
                                                    <div class="row justify-content-center">
                                                        {{$history_donatur->links()}}
                                                    </div>
        										</div>

        										<div class="tab-content clearfix" id="tab-post">
        											<div class="row justify-content-center">
        												<h3>Histori Zakat Anda</h3>
        											</div>

        											<div class="row">
        												<?php $no =1;?>
        												@foreach($history_zakat as $history)
        												<div class="col-md-4 col-sm-12">
        													<div class="card">
        														<div class="card-body">
        															<table>
        																<tr>
        																	<th>Nama</th>
        																	<td>:</td>
        																	<td style="padding-left:10px;">{{$history->name}}</td>
        																</tr>
        																<tr>
        																	<th>Nominal</th>
        																	<td>:</td>
        																	<td style="padding-left:10px;">{{'Rp. '.number_format($history->nilai_zakat)}}</td>
        																</tr>
        															</table>
        														</div>
        														<div class="card-footer text-muted">
        															{{$history->tanggal}}
        														</div>
        													</div>    
        												</div>
        												<?php $no++ ?>
        											</div>
        											@endforeach
        										</div>
        										{{ $history_zakat->links() }}
        									</div>

        									<div class="tab-content clearfix" id="tab-profile">
        										<div class="row justify-content-center">
        											<h3>@lang('language.profil_lengkap')</h3>
        										</div>
        										<form action="{{Route('front_end.post_edit_profile', $user->id)}}" method="post" id="form_profile" enctype="multipart/form-data">
        											{{csrf_field()}}
        											<div class="row">
        												<div class="col-md-6">
        													<label for="">Nama</label>
        													<input type="text" class="form-control" name="nama" id="nama" value="{{$user->name}}">
        												</div>
        												<div class="col-md-6">
        													<label for="">Username</label>
        													<input type="text" class="form-control" name="username" id="username" value="{{$user->username}}">
        												</div>
        												<div class="col-md-6">
        													<label for="">Email</label>
        													<input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" readonly="">
        												</div>
        												<div class="col-md-6">
        													<label for="">No HandPhone</label>
        													<input type="text" class="form-control" name="no_hp" id="no_hp" value="{{$user->no_telp}}">
        												</div>
        												<div class="col-md-9">
        													<label for="">Bio</label>
        													<textarea name="bio" id="bio" cols="30" rows="10" class="form-control">{{$user->bio}}</textarea>
        												</div>
        												<div class="col-md-3">
        													<label for="">Foto</label>
        													<br>
        													<center>
        														<img src="{{asset('admin/assets/media/foto-users')}}/{{$user->foto}}" width="50%">
        													</center>
        													<input type="file" class="form-control" name="foto">
        												</div>
        												<div class="col-md-12">
        													<br>
        													<button onclick="cek_simpan_profile()" type="button" class="pull-right btn btn-danger">Simpan</button>
        												</div>
        											</div>
        										</form>
        									</div>

        									<div class="tab-content clearfix" id="tab-password">
        										<div class="row justify-content-center">
        											<h3>@lang('language.ganti_password')</h3>
        										</div>
        										<form action="{{Route('front_end.post_reset_password', $user->id)}}" id="form_password">
        											{{csrf_field()}}
        											<div class="row">
        												<div class="col-md-4">
        													<label for="">Password Lama</label>
        													<input type="password" class="form-control" name="pass_lama" onfocusout="cek_password()" id="pass_lama">
        													<div id="val_pass" style="color:red"></div>
        												</div>
        												<div class="col-md-4">
        													<label for="">Password Baru</label>
        													<input type="password" class="form-control" name="pass_baru" id="pass_baru_1">
        												</div>
        												<div class="col-md-4">
        													<label for="">Ketik Ulang Password Baru</label>
        													<input type="password" class="form-control" id="pass_baru_2">
        													<div class="val_new_pass" style="color:red"></div>
        												</div>
        												<div class="col-md-12">
        													<br>
        													<input type="hidden" id="cek_hasil_password">
        													<button type="button" class="pull-right btn btn-danger" onclick="cek_simpan_password()">Simpan</button>
        												</div>
        											</div>
        										</form>
        									</div>
        								</div>
        							</div>
        						</div>
        					</div>
        				</div>
        				<div class="w-100 line d-block d-md-none"></div>
        			</div>
        		</div>
        	</section>
        </div>
    </div>
</div>




</section><!-- #content end -->

    <!-- Footer
    	============================================= -->
    	<footer id="footer" style="background-color: #002D40;">

    		<div class="container">

            <!-- Footer Widgets
            	============================================= -->

            </div>

        <!-- Copyrights
        	============================================= -->
        	@include('front_page.theme1.main_layouts.footer')
        	<!-- #copyrights end -->

        </footer><!-- #footer end -->

    <!-- Floating Contact
    	============================================= -->
    	@include('front_page.theme1.components.floating_contact')

    </div><!-- #wrapper end -->

    <!-- Go To Top
    	============================================= -->
    	<div id="gotoTop" class="icon-angle-up"></div>
    	<!--Javscript include from main_layouts-->
		@include('front_page.theme1.main_layouts.js')
		<!--end js-->

    	<script>
    		$(document).ready(function() {
    			$('#table-front').DataTable( {
    				responsive: true
    			} );
    		} );

    		$(document).ready(function() {
    			$('#table-front1').DataTable( {
    				responsive: true
    			} );
    		} );

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

    		function cek_password(){
    			var pass_lama = $("#pass_lama").val()
    			console.log(pass_lama)
    			$.ajax({
    				type:'GET',
    				url:'{{Route("front_page.dash_donatur")}}'+'/cek_password/'+pass_lama,
    				success:function(data){
    					console.log(JSON.parse(data))
    					if (JSON.parse(data) == null) {
    						$("#cek_hasil_password").val(0)
    						$("#val_pass").html('password salah')
    					}else{
    						$("#val_pass").html('')
    						$("#cek_hasil_password").val(1)
    					}
    				}
    			})
    		}

    		function cek_simpan_password(){
    			if($("#pass_lama").val() == ""){
    				alert('Password Lama Anda Tidak Diisi')
    			}else if($("#pass_baru_1").val() == "" || $("#pass_baru_2").val() == ""){
    				alert('Password Baru Anda Tidak Diisi')
    			}else if($("#pass_baru_1").val() != $("#pass_baru_2").val()){
    				alert('Password Baru Anda Tidak Sama')
    			}else if($("#cek_hasil_password").val() == 0){
    				alert('Password Lama Anda Salah')
    			}else{
    				alert('Tersimpan')
    				$("#form_password").submit()
    			}
    		}

    		function cek_simpan_profile(){
    			if($("#nama").val() == ""){
    				alert('Nama Anda Kosong')
    			}else if($("#username").val() == ""){
    				alert('Username Anda Kosong')
    			}else if($("#no_hp").val() == ""){
    				alert('No HandPhone Anda Kosong')
    			}else{
    				alert('Tersimpan')
    				$("#form_profile").submit()

    			}
    		}

    	</script>

    </body>

    </html>