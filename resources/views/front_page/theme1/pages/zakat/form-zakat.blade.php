<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-h6zeIVwfGNsnx8RO"></script>
    <!-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-j1IRXn55_e6KGjUr"></script> -->
    <title>Form Zakat | Mizan Amanah</title>

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

        		<div class="content-wrap">

        			<div class="container clearfix">

        				<div class="row justify-content-center">
        					<div class="col-md-7 ">
        						<div class="heading-block nobottomborder mb-4 center">
        							<h4 class="mb-4 nott">Tunaikan Zakat</h4>
        						</div>
        						<div class="svg-line bottommargin-sm clearfix center">
        							<hr style="background-color: red; height: 1px; width: 50%;">
        						</div>
        					</div>
        				</div>
        				<div class="form-widget" style="margin-top: 20px;">

        					<div class="form-result"></div>

        					<div class="row justify-content-center">

        						<div class="col-lg-6 ">
        							<form class="row" id="payment-form" action="{{Route('zakat.snapfinishs')}}" method="post"
        							enctype="multipart/form-data">
        							<input type="hidden" name="_token" value="{!! csrf_token() !!}">
        							<input type="hidden" name="result_type" id="result-type" value="">
        							<input type="hidden" name="result_data" id="result-data" value="">
        							<input type="hidden" name="id" value="{{session::get('id')}}">
        							<!-- <input type="hidden" name="category_id" value="{{$kategori}}"> -->
        							<!-- <div class="form-process"></div> -->
        							<div class="col-12 form-group">
        								<label>Kategori Zakat</label>
        								<select class="form-control" name="category_id" id="category_id" onchange="get_kategori()" required="">
        									<option selected="" disabled="">Pilih Kategori</option>
        									@foreach($category as $val)
        									<?php if($kategori == $val->id){
        										$selected = 'selected';
        									}else{
        										$selected = '';
        									}
        									?>
        									<option value="{{$val->id}}" <?=$selected?> >{{$val->category}}</option>
        									@endforeach
        								</select>
        								<input type="hidden" name="category_produk" value="" id="category_produk">
        							</div>
        							<div class="col-12 form-group">
        								<label>Jumlah Zakat</label>
        								<input type="text" name="donation" class="form-control required" value="{{$jumlah_zakat}}"
        								placeholder="Jumlah Zakat" id="donationtext">
        							</div>

        							@if(session::get('id') == null)
        							<div class="col-12" style="margin-top: 5px; margin-bottom:20px; text-align:center;">
        								<a href="{{Route('front_page.login')}}">Silahkan
        								Login atau Isi data di bawah ini</a>
        							</div>
        							@endif
        							<div class="col-12 form-group">
        								<label>Nama Lengkap</label>
        								<?php if(session::has('name') != null){ ?>
        									<input type="text" name="nama" class="form-control required" value="{{session::get('name')}}"
        									placeholder="Masukan Nama Lengkap" id="nama" readonly="true">
        								<?php } else { ?>
        									<input type="text" name="nama" class="form-control required" value="{{session::get('name')}}"
        									placeholder="Masukan Nama Lengkap" id="nama">
        								<?php } ?>
        							</div>
        							<div class="col-12 form-group">
        								<label>No Handphone / Whatsapp</label>
        								<?php if(session::has('no_telp') != null) { ?>
        									<input type="number" name="no_telp" class="form-control required" value="{{session::get('no_telp')}}" placeholder="Masukan No Handphone" id="no_telp" readonly="true">
        								<?php } else { ?>
        									<input type="number" name="no_telp" class="form-control required" value="{{session::get('no_telp')}}" placeholder="Masukan No Handphone" id="no_telp">
        								<?php } ?>
        							</div>
        							<div class="col-12">
        								<div class="form-group">
        									<label>Alamat</label>
        									<?php if(session::has('alamat') != null){ ?>
        										<textarea name="alamat" id="alamat" class="form-control required" cols="30" rows="5" readonly="true">{{session::get('alamat')}}</textarea>
        									<?php } else { ?>
        										<textarea name="alamat" id="alamat" class="form-control required" cols="30" rows="5">{{session::get('alamat')}}</textarea>
        									<?php } ?>
        								</div>
        							</div>
        							<div class="col-12 form-group">
        								<label>Email:</label>
        								<?php if(session::has('email') != null) {?>
        									<input type="email" name="email" class="form-control required" value="{{session::get('email')}}"
        									placeholder="Masukan Alamat Email" id="email" readonly="true">
        								<?php } else { ?>
        									<input type="email" name="email" class="form-control required" value="{{session::get('email')}}"
        									placeholder="Masukan Alamat Email" id="email">
        								<?php } ?>
        							</div>
        							<div class="col-12 hidden">
        								<input type="text" id="event-registration-botcheck"
        								name="event-registration-botcheck" value="" />
        							</div>
        							<div class="col-12 center">
        								<button type="button" class="btn btn-program btn-danger" onclick="simpan()">Lanjutkan Pembayaran</button>
        							</div>

        							<input type="hidden" name="prefix" value="event-registration-">
                                    <input type="hidden" name="komentar" value="" id="komentar">
                                    <input type="hidden" name="anonim" value="0" id="anonim">
                                    <input type="hidden" name="verifikasi" value="1" id="verifikasi">
                                </form>
                            </div>
                            <div class="modal1 mfp-hide" id="myModal1">
                              <div class="block divcenter" style="background-color: #FFF; max-width: 700px;">
                               <div class="row nomargin clearfix">
                                <div class="col-md-6" data-height-xl="456" data-height-lg="456"
                                data-height-md="456" data-height-sm="0" data-height-xs="0"
                                style="background-image: url(one-page/images/page/4.jpg); background-size: cover;">
                            </div>
                            <div class="col-md-6 col-padding" data-height-xl="456" data-height-lg="456"
                            data-height-md="456" data-height-sm="456" data-height-xs="456">
                            <div>
                                <h4 class="uppercase ls1">Sign in</h4>
                                <form action="#" class="clearfix" style="max-width: 300px;">
                                 <div class="col_full">
                                  <label for="" class="capitalize t600">Username or Email:</label>
                                  <input type="email" id="template-op-form-email"
                                  name="template-op-form-email" value=""
                                  class="sm-form-control" />
                              </div>
                              <div class="col_full">
                                  <label for="" class="capitalize t600">Password:</label>
                                  <input type="password" id="template-op-form-password"
                                  name="template-op-form-password" value=""
                                  class="sm-form-control" />
                              </div>
                              <div class="col_full nobottommargin">
                                  <button type="submit"
                                  class="button button-rounded button-small button-dark nomargin"
                                  value="submit">Login</button>
                              </div>
                          </form>
                          <a href="registerpage.html">Create new Account!</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>

</div>

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

        <!-- Copyrights
        	============================================= -->
        	@include('front_page.theme1.main_layouts.footer')
            @include('front_page.theme1.components.floating_contact')

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

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

    		var rupiah = document.getElementById('donationtext');
    		rupiah.addEventListener('keyup', function(e){
                // tambahkan 'Rp.' pada saat form di ketik
                // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
                rupiah.value = formatRupiah(this.value, 'Rp. ');
            });

    		/* Fungsi formatRupiah */
    		function formatRupiah(angka, prefix){
    			var number_string = angka.replace(/[^,\d]/g, '').toString(),
    			split             = number_string.split(','),
    			sisa              = split[0].length % 3,
    			rupiah            = split[0].substr(0, sisa),
    			ribuan            = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                	separator = sisa ? '.' : '';
                	rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

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

            function simpan(){
            	var validation = 0;
            	var validationText = "";

            	var zakat = 0;
            	if($("#donationtext").val()!=''){
            		zakat = $("#donationtext").val().substr(4).replace(/\./g,'');
            	} else if($("input[name='donation']:checked").val() != null){
            		zakat = $("input[name='donation']:checked").val();
            	} else {
            		validation++;
            		validationText = validationText + "Nilai zakat tidak boleh kosong\n";
            	}

            	$("#donationtext").val(zakat);

            	if($("#nama").val()==''){ validation++; validationText = validationText + "Nama Lengkap tidak boleh kosong\n"; }
            	if($("#no_telp").val()==''){ validation++; validationText = validationText + "No Telepon tidak boleh kosong\n"; }
            	if($("#email").val()==''){ validation++; validationText = validationText + "Email tidak boleh kosong\n"; }
            	if($("#verifikasi").val()==''){ validation++; validationText = validationText + "Verifikasi tidak boleh kosong\n"; }

            	if(validation>0){
            		alert(validationText);
            	} else {
            		$(this).attr("disabled", "disabled");
            		var dataPost = {
            			jumlah_zakat 	  : zakat,
            			komentar 		  : ($("#komentar").val()=='')?'-':$("#komentar").val(),
            			category_produk   : $('#category_produk').val(),
            			nama 			  : $("#nama").val(),
            			email 			  : $("#email").val(),
            			no_telp			  : $("#no_telp").val(),
            			anonim 			  : ($("input[name='anonim']:checked").val() != null)?'1':'0',
            			verifikasi 	      : ($("input[name='verifikasi']:checked").val() != null)?'1':'0'
            		}

            		$.ajax({
            			url: '{{Route("zakat.snaptokens")}}',
            			cache: false,
            			data: dataPost,
            			success: function(data) {
            				console.log('token = '+data);

            				var resultType = document.getElementById('result-type');
            				var resultData = document.getElementById('result-data');
            				function changeResult(type,data){
            					$("#result-type").val(type);
            					$("#result-data").val(JSON.stringify(data));
            				}
            				snap.pay(data, {

            					onSuccess: function(result){
            						changeResult('success', result);
            						console.log(result.status_message);
            						console.log(result);
            						$("#payment-form").submit();
            						setTimeout(function() {
                                        location.reload();
                                    }, 300);
            					},
            					onPending: function(result){
            						changeResult('pending', result);
            						console.log(result.status_message);
            						$("#payment-form").submit();
            						setTimeout(function() {
                                        location.reload();
                                    }, 300);
            					},
            					onError: function(result){
            						changeResult('error', result);
            						console.log(result.status_message);
            						$("#payment-form").submit();
            						setTimeout(function() {
                                        location.reload();
                                    }, 300);
            					},
            					onClose: function(){
            						setTimeout(function() {
                                        location.reload();
                                    }, 100);
            					}
            				});
            			}
            		});
            	}
            };

            function get_kategori()
            {
            	var category_id = $('#category_id').val();

            	$.ajax({
            		Type : 'GET', 
            		dataType : 'json',
            		url : '{{url("get_data_kategori")}}/'+category_id,
            		success: function(data){
            			$('#category_produk').val(data.category)
            		}
            	});
            }
        </script>


    </body>

    </html>