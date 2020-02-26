<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-h6zeIVwfGNsnx8RO"></script>
	<!-- <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-lZzj2SWMQuGleE8k"></script> -->
	<title>Donates Page | Mizan Amanah</title>

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
        							<h2 class="mb-4 nott">Donasi</h2>
        						</div>
        						<div class="svg-line bottommargin-sm clearfix">
        							<hr style="background-color: red; height: 1px; width: 250px;">
        						</div>
        					</div>
        				</div>
        				<div class="form-widget" style="margin-top: 20px;">

        					<div class="form-result"></div>

        					<div class="row">
        						<div class="col-lg-6 pl-lg-4" style="margin-bottom: 20px;">

        							<div class="feature-box media-box">
        								<div class="fbox-media">
        									<img src="{{asset('admin/assets/media/foto-program')}}/{{$program->foto}}">
        								</div>
        								<div class="fbox-desc">
        									<?php 
        									$total  = $program->total;
        									$target = $program->dana_target;

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
                          ?>
                          <h3>{{$program->judul}}</h3>
                          <ul class="skills mb-3">
                            <li data-percent="{{$hasil}}">
                             <div class="progress">
                             </div>
                           </li>
                         </ul>
                         @if($program->dana_target != null)
                         @if($program->total != null)
                         <label>Terkumpul {{'Rp. '.number_format($dana_terkumpul->total)}} dari {{'Rp. '.number_format($program->dana_target)}} ({{$hasil}}%)</label>
                         @endif
                         @else
                         @if($dana_terkumpul != null)
                         <label>Terkumpul {{'Rp. '.number_format($dana_terkumpul->total)}} ({{$hasil}}%)</label>
                         @else
                         <label>Rp. 0</label>
                         @endif
                         @endif
                         {!! substr($program->deskripsi,0, 500). ". . . . . ." !!}<br>
                         <a href="{{Route('program.detailprogram', $program->seo)}}" class="more-link">
                          Read More
                        </a><br><br><br>
                      </div>
                    </div>
                    <div class="clear"></div>

                  </div>
                  <div class="col-lg-6">
                   <form id="payment-form" action="{{Route('donasi.snapfinish')}}" method="post">
                    {{csrf_field()}}
                    <!-- <div class="form-process"></div> -->
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">
                    <input type="hidden" name="program_id" value="{{$program->id}}">
                    <input type="hidden" name="user_id" value="{{session::get('id')}}">
                    <input type="hidden" name="nama_produk" value="Program {{$program->category}} Mizan Amanah" id="nama_produk">
                    <div class="col-12 form-group">
                     <label>Donasi</label>
                     <input type="text" name="donation" class="form-control required" value=""
                     placeholder="Masukan Jumlah donasi" id="donationtext">
                   </div>
                   @if(session::get('id') == null)
                   <div class="col-12" style="margin-top: 5px; margin-bottom:20px; text-align:center;">
                     <a href="{{Route('front_page.login')}}">Silahkan Login atau Isi data di bawah ini</a>
                   </div>
                   @endif
                   <div class="col-12 form-group">
        									<!-- <label>Metode Pembayaran</label>
        									<select class="form-control" name="metode_pembayaran" id="metode_pembayaran">
        										<option value="1">Transfer Manual</option>
        										<option value="0">Virtual Account</option>
        									</select> -->

                          <input type="hidden" name="metode_pembayaran" id="metode_pembayaran" value="0">
                        </div>
                        <div class="col-12 form-group">
                         <label>Nama Lengkap</label>
                         <?php if(session::has('name') != null){ ?>
                          <input type="text" name="nama" class="form-control required" value="{{session::get('name')}}"
                          placeholder="Masukan Nama Lengkap" id="nama" readonly="true">
                        <?php }else{ ?>
                          <input type="text" name="nama" class="form-control required" value="{{session::get('name')}}"
                          placeholder="Masukan Nama Lengkap" id="nama">
                        <?php } ?>
                      </div>
                      <div class="col-12 form-group">
                       <label>No Handphone / Whatsapp</label>
                       <?php if(session::has('no_telp') != null){ ?>
                        <input type="number" name="no_telp" class="form-control required" value="{{session::get('no_telp')}}"
                        placeholder="Masukan No Handphone" id="no_telp" readonly="true">
                      <?php }else{ ?>
                        <input type="number" name="no_telp" class="form-control required" value="{{session::get('no_telp')}}"
                        placeholder="Masukan No Handphone" id="no_telp">
                      <?php } ?>
                    </div>
                    <div class="col-12 form-group">
                     <label>Email</label>
                     <?php if(session::has('email') != null){ ?>
                      <input type="email" name="email" class="form-control required" value="{{session::get('email')}}"
                      placeholder="Masukan Alamat Email" id="email" readonly="true">
                    <?php }else{ ?>
                      <input type="email" name="email" class="form-control required" value="{{session::get('email')}}"
                      placeholder="Masukan Alamat Email" id="email">
                    <?php } ?>
                  </div>
                  <input type="hidden" name="komentar" value="" id="komentar">
                  <input type="hidden" name="anonim" value="0" id="anonim">
                  <input type="hidden" name="verifikasi" value="1" id="verifikasi">
                  <div class="col-12 center">
                   <button type="button" class="button btn-program" onclick="simpan()">Donasi</button>
                 </div>
               </form>
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
        </footer>
        @include('front_page.theme1.components.floating_contact')

      </div><!-- #wrapper end -->
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
        rupiah.value = formatRupiah(this.value, 'Rp. ');
      });

       /* Fungsi formatRupiah */
       function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split             = number_string.split(','),
        sisa              = split[0].length % 3,
        rupiah            = split[0].substr(0, sisa),
        ribuan            = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
         separator = sisa ? '.' : '';
         rupiah += separator + ribuan.join('.');
       }

       rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
       return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
     }

     function simpan(){
      var id = $('#metode_pembayaran').val();
      if (id == 1) {
       $("#payment-form").submit();

       setTimeout(function () {
        window.location.href = "{{Route('notif.konfirmasi')}}";
      }, 300);

     }else{

       var validation = 0;
       var validationText = "";

       var donation = 0;
       if($("#donationtext").val()!=''){
        donation = $("#donationtext").val().substr(4).replace(/\./g,'');
      } else if($("input[name='donation']:checked").val() != null){
        donation = $("input[name='donation']:checked").val();
      } else {
        validation++;
        validationText = validationText + "Nilai donasi tidak boleh kosong\n";
      }

      if($("#nama").val()==''){ validation++; validationText = validationText + "Nama Lengkap tidak boleh kosong\n"; }
      if($("#no_telp").val()==''){ validation++; validationText = validationText + "No Telepon tidak boleh kosong\n"; }
      if($("#email").val()==''){ validation++; validationText = validationText + "Email tidak boleh kosong\n"; }
      if($("#verifikasi").val()==''){ validation++; validationText = validationText + "Verifikasi tidak boleh kosong\n"; }

      if(validation>0){
        alert(validationText);
      } else {
        $(this).attr("disabled", "disabled");
        var dataPost = {
         jumlah_donasi 	  : donation,
         komentar 		  : ($("#komentar").val()=='')?'-':$("#komentar").val(),
         nama_produk       : $("#nama_produk").val(),
         nama 			  : $("#nama").val(),
         email 			  : $("#email").val(),
         no_telp			  : $("#no_telp").val(),
         anonim 			  : ($("input[name='anonim']:checked").val() != null)?'1':'0',
         verifikasi 	      : ($("input[name='verifikasi']:checked").val() != null)?'1':'0'
       }

       $.ajax({
         url: '{{Route("donasi.snaptoken")}}',
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
              window.location.href = "{{Route('notif.success')}}";
            }, 300);
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
            setTimeout(function() {
              window.location.href = "{{Route('notif.pending')}}";
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
   }
 };
</script>
</body>
</html>