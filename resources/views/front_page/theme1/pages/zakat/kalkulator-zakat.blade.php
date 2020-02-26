<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<title>Kalkulator Zakat | Mizan Amanah</title>

</head>

<body class="stretched">

	<!-- Document Wrapper ============================================= -->
	<div id="" class="clearfix">

		<!-- Header	============================================= -->
		@include('front_page.theme1.main_layouts.header')
		<!-- #header end -->

		<!-- Content ============================================= -->
		<section id="content" style="overflow: visible">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="row justify-content-center">
						<div class="col-md-7 ">
							<div class="heading-block nobottomborder mb-4 center">
								<h4 class="mb-4 nott">Hitung Zakat Anda</h4>
							</div>
							<div class="svg-line bottommargin-sm clearfix center">
								<hr style="background-color: red; height: 1px; width: 50%;">
							</div>
						</div>
					</div>

					<ul id="myTab" class="nav nav-tabs boot-tabs">
						<li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Zakat Penghasilan</a></li>
						<li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Zakat Harta (Maal)</a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Zakat Perniagaan</a></li> -->
						<li class="nav-item"><a class="nav-link" href="#tab4" data-toggle="tab">Zakat Fitrah</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active show" id="tab1">
							<form action="{{Route('zakat.insert_penghasilan')}}" method="POST" id="zakat_penghasilan">
								{{csrf_field()}}
								<input type="hidden" name="category" value="{{$zakat_hasil}}">
								<h4>Perhitungan Zakat Penghasilan</h4><hr>
								<div class="row">
									<div class="col-md-12">
										<input type="checkbox" name="perhitungan" id="perhitungan" onclick="cek_perhitungan()"> <label>Saya punya perhitungkan sendiri (tanpa kalkulator)</label><hr>
									</div>
								</div>
								<div class="row" id="hide1"> 
									<div class="col-md-12">
										<label>Penghasilan Perbulan</label>
										<input type="text" name="penghasilan_perbulan" class="form-control" placeholder="Penghasilan Perbulan" id="penghasilan_perbulan" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
									</div>
									<div class="col-md-12"><br>
										<label>Penghasilan Tambahan Perbulan</label>
										<input type="text" name="penghasilan_tambahan" class="form-control" placeholder="Penghasilan Rata Rata Perbulan" id="penghasilan_tambahan" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
									</div>
									<div class="col-md-12"><br>
										<label>Pengeluaran Pokok Per Perbulan</label>
										<input type="text" name="pengeluaran_pokok" class="form-control" placeholder="Pengeluaran Pokok Per Perbulan" id="pengeluaran_pokok" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
									</div>
									<div class="col-md-12"><br>
										<label>Harga Beras (/Kg)</label>
										<input type="text" name="harga_beras" class="form-control" placeholder="Harga Beras Per Kilogram" id="harga_beras" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
									</div>
									<div class="col-md-12"><br>
										<label>Nishab (Harga Beras x 522 Kg)</label>
										<input type="text" name="nishab" class="form-control" placeholder="Rp. 0" id="nishab" readonly="true" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);">
									</div>
									<div class="col-md-12"><br>
										<label>Jumlah bulan Yang Akan di Bayarkan Zakatnya</label>
										<input type="text" name="jumlah_bulan" class="form-control" placeholder="Jumlah bulan Yang Akan di Bayarkan Zakatnya" id="jumlah_bulan" onkeydown="return numbersonlyNonRp(this, event);" onkeyup="javascript:tandaPemisahTitikNonRp(this);" value="1">
									</div>
									<div class="col-md-12"><br>
										<label>Besar Zakat Hasil Perhitungan</label>
										<input type="text" name="total_zakat" class="form-control" readonly="true" id="total_zakat" placeholder="Rp. 0">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" id="hidebesarpenghasilan"><br>
										<label>Besar Zakat Yang Ingin di Bayarkan</label>
										<input type="text" name="besar_zakat" class="form-control" id="besar_zakat_penghasilan" disabled="" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tand.aPemisahTitik(this);" placeholder="Rp. 0">
									</div>
									<div class="col-md-12"><br>
										<input type="checkbox" name="verifikasi" id="verifikasi" onclick="cek_persetujuan()"> <label>Serahkan</label>
										<p>Bismillah. Saya serahkan zakat saya kepada Yayasan Mizan Amanah agar dapat dikelola dengan sebaik-baiknya sesuai dengan ketentuan syariat agama.</p>
										<button type="button" class="btn btn-danger" id="bayar" disabled="disabled" onclick="simpan_penghasilan()">Bayar</button>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="tab2">
							<form action="{{Route('zakat.insert_harta')}}" method="POST" id="zakat_harta">
								{{csrf_field()}}
								<input type="hidden" name="category" value="{{$zakat_harta}}">
								<h4>Perhitungan Zakat Harta (Maal)</h4><hr>
								<div class="row">
									<div class="col-md-12">
										<input type="checkbox" name="perhitungan" id="perhitungan" onclick="cek_perhitungan_2()"> <label>Saya punya perhitungkan sendiri (tanpa kalkulator)</label><hr>
									</div>
								</div>
								<div class="row" id="hide2">
									<div class="col-md-12">
										<label>Jumlah Emas Yang Tidak di Pakai <small>( Harga Emas/gram Rp. 662.000)</small></label>
										<input type="text" name="emas_tidak_terpakai" class="form-control" placeholder="Jumlah Emas Yang Tidak di Pakai" id="jumlah_emas" onkeydown="return numbersonlyNonRp(this, event);" onkeyup="javascript:tandaPemisahTitikNonRp(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Jumlah Perak Yang Tidak di Pakai <small>( Harga Perak/gram Rp. 13.200)</small></label>
										<input type="text" name="perak_tidak_terpakai" class="form-control" placeholder="Jumlah Perak Yang Tidak di Pakai" id="jumlah_perak" onkeydown="return numbersonlyNonRp(this, event);" onkeyup="javascript:tandaPemisahTitikNonRp(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Uang Tunai, Tabungan, Deposito, atau Sejenisnya</label>
										<input type="text" name="uang_tunai" class="form-control" placeholder="Uang Tunai, Tabungan, Deposito, atau Sejenisnya" id="jumlah_uang" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Properti <small>( Tidak Termasuk Yang di Tinggali)</small></label>
										<input type="textt" name="properti" class="form-control" placeholder="Properti" id="jumlah_properti" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Kendaraan <small>( Tidak Termasuk Yang di Pakai Untuk Keperluan Keluarga)</small></label>
										<input type="text" name="kendaraan" class="form-control" placeholder="Kendaraan" id="jumlah_kendaraan" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Saham, Sukuk, dan Surat Berharga Lainnya</label>
										<input type="text" name="surat_surat" class="form-control" placeholder="Saham, Sukuk, dan Surat Berharga Lainnya" id="jumlah_saham" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Harta Lainnya <small>( Koleksi Seni, Barang Antik, Barang Berharga, dll)</small></label>
										<input type="text" name="harta_lainnya" class="form-control" placeholder="Harta Lainnya" id="jumlah_lainnya" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Total Harta</label>
										<input type="text" name="total_harta" class="form-control" placeholder="Rp. 0" id="total_harta" readonly="true" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Kewajiban Hutang Jatuh Tempo</label>
										<input type="text" name="kewajiban_hutang" class="form-control" placeholder="Kewajiban Hutang Jatuh Tempo" id="kewajiban_hutang" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Harta Yang di Zakatkan</label>
										<input type="text" name="harta_zakat" class="form-control" placeholder="Rp. 0" id="harta_zakat" readonly="true" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Nisab Zakat Harta <small>( Setara dengan 85 gr Emas x Harga Emas )</small></label>
										<input type="text" name="nisab_zakat_harta" class="form-control" placeholder="Rp. 0" id="nisab_zakat_harta" readonly="true" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" id="hidebesarharta"><br>
										<label>Besar Zakat Yang Ingin di Bayarkan</label>
										<input type="text" name="besar_zakat" class="form-control" id="besar_zakat2" disabled="disabled" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" placeholder="Rp. 0">
									</div>
									<div class="col-md-12"><br>
										<input type="checkbox" name="verifikasi" id="verifikasi" onclick="cek_persetujuan_2()"> <label>Serahkan</label>
										<p>Bismillah. Saya serahkan zakat saya kepada Yayasan Mizan Amanah agar dapat dikelola dengan sebaik-baiknya sesuai dengan ketentuan syariat agama.</p>
										<button type="button" class="btn btn-danger" id="bayar2" disabled="disabled" onclick="submit2()">Bayar</button>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="tab3">
							<form action="{{Route('zakat.insert_perniagaan')}}" method="POST" id="zakat_perniagaan">
								{{csrf_field()}}
								<h4>Perhitungan Zakat Perniagaan</h4><hr>
								<div class="row">
									<div class="col-md-12">
										<input type="checkbox" name="perhitungan" id="perhitungan" onclick="cek_perhitungan_3()"> <label>Saya punya perhitungkan sendiri (tanpa kalkulator)</label><hr>
									</div>
								</div>
								<div class="row" id="hide3">
									<div class="col-md-12">
										<label>Modal Yang di Putar Selama Setahun</label>
										<input type="text" name="modal_setahun" class="form-control" placeholder="Modal Yang di Putar Selama Setahun" id="modal_setahun" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Pendapatan Tahunan dalam Bentuk Uang</label>
										<input type="text" name="pendapatan_tahunan" class="form-control" placeholder="Pendapatan Tahunan dalam Bentuk Uang" id="pendapatan_tahunan" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Nilai Barang Dagangan</label>
										<input type="text" name="nilai_dagangan" class="form-control" placeholder="Nilai Barang Dagangan" id="nilai_dagangan" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Pengeluaran dalam Bentuk Uang</label>
										<input type="textt" name="pengeluaran_uang" class="form-control" placeholder="Pengeluaran dalam Bentuk Uang" id="pengeluaran_uang" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Piutang Lancar</label>
										<input type="textt" name="piutang_lancar" class="form-control" placeholder="Piutang Lancar" id="piutang_lancar" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Hutang</label>
										<input type="text" name="hutang" class="form-control" placeholder="Hutang" id="hutang" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Harga Emas</label>
										<input type="text" name="harga_emas" class="form-control" placeholder="Harga Emas" id="harga_emas" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Total Perniagaan Yang Terkena Zakat</label>
										<input type="text" name="total_perniagaan" class="form-control" placeholder="Rp. 0" id="total_perniagaan" readonly="true" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Nisab Zakat Perniagaan <small>( Setara dengan 85 gr Emas x Harga Emas )</small></label>
										<input type="text" name="nisab_zakat_perniagaan" class="form-control" placeholder="Rp. 0" id="nisab_zakat_perniagaan" readonly="true" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12"><br>
										<label>Besar Zakat Yang Ingin di Bayarkan</label>
										<input type="text" name="besar_zakat" class="form-control" id="besar_zakat3" disabled="disabled" placeholder="Rp. 0">
									</div>
									<div class="col-md-12"><br>
										<input type="checkbox" name="verifikasi" id="verifikasi" onclick="cek_persetujuan_3()"> <label>Serahkan</label>
										<p>Bismillah. Saya serahkan zakat saya kepada Yayasan Mizan Amanah agar dapat dikelola dengan sebaik-baiknya sesuai dengan ketentuan syariat agama.</p>
										<button type="button" class="btn btn-danger" id="bayar3" disabled="disabled" onclick="submit3()">Bayar</button>
									</div>
								</div>
							</form>
						</div>
						<div class="tab-pane fade" id="tab4">
							<form action="{{Route('zakat.insert_fitrah')}}" method="POST" id="zakat_fitrah">
								{{csrf_field()}}
								<input type="hidden" name="category" value="{{$zakat_fitrah}}">
								<h4>Perhitungan Zakat Fitrah</h4><hr>
								<div class="row">
									<div class="col-md-12">
										<input type="checkbox" name="perhitungan" id="perhitungan" onclick="cek_perhitungan_4()"> <label>Saya punya perhitungkan sendiri (tanpa kalkulator)</label><hr>
									</div>
								</div>
								<div class="row" id="hide4">
									<div class="col-md-12">
										<label>Harga Beras</label>
										<input type="text" name="harga_beras_fitrah" class="form-control" placeholder="Harga Beras" id="harga_beras_fitrah" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"><br>
									</div>
									<div class="col-md-12">
										<label>Jumlah Zakat <small>(Harga Beras x 2.5 kg)</small></label>
										<input type="text" name="jumlah_zakat_fitrah" class="form-control" placeholder="Jumlah Zakat" id="jumlah_zakat_fitrah" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" readonly="true"><br>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" id="hidebesarfitrah"><br>
										<label>Besar Zakat Yang Ingin di Bayarkan</label>
										<input type="text" name="besar_zakat" class="form-control" id="besar_zakat4" disabled="disabled" placeholder="Rp. 0">
									</div>
									<div class="col-md-12"><br>
										<input type="checkbox" name="verifikasi" id="verifikasi" onclick="cek_persetujuan_4()"> <label>Serahkan</label>
										<p>Bismillah. Saya serahkan zakat saya kepada Yayasan Mizan Amanah agar dapat dikelola dengan sebaik-baiknya sesuai dengan ketentuan syariat agama.</p>
										<button type="button" class="btn btn-danger" id="bayar4" disabled="disabled" onclick="submit4()">Bayar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Content end -->
	</div>
	<!-- End Document -->

	<!-- Footer ============================================= -->
	<footer id="footer" style="background-color: #002D40;">

		<div class="container">

            <!-- Footer Widgets
            	============================================= -->

            </div>

            <!-- Copyrights ============================================= -->
            <div id="copyrights" class="bgcolor">

            	<div class="container clearfix">

            		<div class="row justify-content-between align-items-center">
            			<div class="col-md-6">
            				Copyrights &copy; 2014 All Rights Reserved by Canvas Inc.<br>
            				<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a>
            				</div>
            			</div>

            			<div class="col-md-6 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
            				<div class="copyrights-menu copyright-links clearfix">
            					<a href="#">About</a>/<a href="#">Features</a>/<a href="#">FAQs</a>/<a href="#">Contact</a>
            				</div>
            			</div>
            		</div>

            	</div>
            </div>
            <!-- #copyrights end -->
        </footer>
        <!-- #footer end -->

        <!-- Floating Contact ============================================= -->
        <div class="floating-contact-wrap">
        	<div class="floating-contact-btn shadow">
        		<i class="floating-contact-icon btn-unactive icon-envelope21"></i>
        		<i class="floating-contact-icon btn-active icon-line-plus"></i>
        	</div>
        	<div class="floating-contact-box">
        		<div id="q-contact" class="widget quick-contact-widget clearfix">
        			<div class="floating-contact-heading bgcolor p-4 rounded-top">
        				<h3 class="mb-0 font-secondary h2 ls0">Quick Contact 👋</h3>
        				<p class="mb-0">Get in Touch with Us</p>
        			</div>
        			<div class="form-widget" data-alert-type="false">
        				<div class="form-result"></div>
        				<div class="floating-contact-loader css3-spinner" style="position: absolute;">
        					<div class="css3-spinner-bounce1"></div>
        					<div class="css3-spinner-bounce2"></div>
        					<div class="css3-spinner-bounce3"></div>
        				</div>
        				<div id="floating-contact-submitted" class="p-5 center">
        					<i class="icon-line-mail h1 color"></i>
        					<h4 class="t400 mb-0 font-body">Thank You for Contact Us! Our Team will contact you asap on
        					your email Address.</h4>
        				</div>
        				<form class="mb-0" id="floating-contact" action="include/form.php" method="post"
        				enctype="multipart/form-data">
        				<div class="input-group mb-3">
        					<div class="input-group-prepend">
        						<span class="input-group-text nobg"><i class="icon-user-alt"></i></span>
        					</div>
        					<input type="text" name="floating-contact-name" id="floating-contact-name"
        					class="form-control required" value="" placeholder="Enter your Full Name">
        				</div>
        				<div class="input-group mb-3">
        					<div class="input-group-prepend">
        						<span class="input-group-text nobg"><i class="icon-at"></i></span>
        					</div>
        					<input type="email" name="floating-contact-email" id="floating-contact-email"
        					class="form-control required" value="" placeholder="Enter your Email Address">
        				</div>
        				<div class="input-group mb-3">
        					<div class="input-group-prepend">
        						<span class="input-group-text nobg"><i class="icon-comment21"></i></span>
        					</div>
        					<textarea name="floating-contact-message" id="floating-contact-message"
        					class="form-control required" cols="30" rows="4"></textarea>
        				</div>
        				<input type="hidden" id="floating-contact-botcheck" name="floating-contact-botcheck" value="" />
        				<button type="submit" name="floating-contact-submit" class="btn btn-dark btn-block py-2">Send
        				Message</button>
        				<input type="hidden" name="prefix" value="floating-contact-">
        				<input type="hidden" name="subject" value="Messgae From Floating Contact">
        				<input type="hidden" name="html_title" value="Floating Contact Message">
        			</form>
        		</div>
        	</div>
        </div>
        <!-- Modal -->
        <div class="modal1 mfp-hide" id="myModal1">
        	<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
        		<div class="center" style="padding: 50px;">
        			<img src="images/sukses.png" alt="" style="margin-bottom: 10px;">


        			<p class="nobottommargin">Hasil Perhitungan Zakat Profesi Zakat Anda</p>
        			<h2>Rp 175.000</h2>
        		</div>
        		<div class="section center nomargin" style="padding: 30px;">
        			<a href="#" class="button" onClick="$.magnificPopup.close();return false;">Tunaikan Zakat</a>
        		</div>
        	</div>
        </div>

        <div class="modal1 mfp-hide" id="myModal2">
        	<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
        		<div class="center" style="padding: 50px;">
        			<img src="images/invalid.png" alt="" style="margin-bottom: 10px;">


        			<p class="nobottommargin">Hasil Perhitungan Zakat Profesi
        				Anda belum memenuhi nisab zakat.
        				Tetepi anda bisa bersedekah 
        			Program lainnya di Mizan Amanah</p>

        		</div>
        		<div class="section center nomargin" style="padding: 30px;">
        			<a href="#" class="button" onClick="$.magnificPopup.close();return false;">Sedekah Saja</a>
        		</div>
        	</div>
        </div>
    </div>
</div>
<!-- #wrapper end -->

<!-- Go To Top ============================================= -->
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
    			$('#hidebesarpenghasilan').hide();
    			$('#hidebesarharta').hide();
    			$('#hidebesarfitrah').hide();
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

    	<script type="text/javascript">
    		//Zakat Penghasilan
    		function cek_perhitungan(){
    			var ceks  = document.getElementById('hide1');

    			if(ceks.style.display === "none"){ 
    				ceks.style.display  = "block";
    				$('#hidebesarpenghasilan').hide();
    				$('#besar_zakat_penghasilan').attr('disabled','disabled');
    			}else{
    				ceks.style.display = "none";
    				$('#hidebesarpenghasilan').show();
    				$('#besar_zakat_penghasilan').removeAttr('disabled');

    			}
    		}

    		function cek_persetujuan(){
    			var verifikasi = $("input[name='verifikasi']:checked").val();
    			var btn_bayar  = document.getElementById('bayar');

    			if (verifikasi != null) {
    				$('#bayar').removeAttr('disabled');
    			}else{
    				$('#bayar').attr('disabled', 'disabled');
    			}
    		}

    		function besar_zakat_penghasilan(){
    			var penghasilan_perbulan = Number($('#penghasilan_perbulan').val().substr(3).replace(/,/g, ""));
    			var penghasilan_tambahan = Number($('#penghasilan_tambahan').val().substr(3).replace(/,/g, ""));
    			var pengeluaran_pokok 	 = Number($('#pengeluaran_pokok').val().substr(3).replace(/,/g, ""));
    			var harga_beras 		 = Number($('#harga_beras').val().substr(3).replace(/,/g, ""));
    			var qty_beras 			 = Number(522);
    			var jumlah_bulan_hasil   = Number($('#jumlah_bulan').val());

    			var nishab 				 = harga_beras * qty_beras;
    			var total_zakat 		 = (penghasilan_perbulan + penghasilan_tambahan - pengeluaran_pokok) * (2.5/100) * jumlah_bulan_hasil;

    			if(total_zakat < 0){
    				hasil_zakat = 0;
    			}else{
    				hasil_zakat = total_zakat;
    			}

    			$('#nishab').val('Rp. '+nishab.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    			$('#total_zakat').val('Rp. '+hasil_zakat.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    		}

    		function simpan_penghasilan(){
    			var nishab       = Number($('#nishab').val().substr(3).replace(/,/g, ""));
    			var total_zakat  = Number($('#total_zakat').val().substr(3).replace(/,/g, ""));
    			var jumlah_bulan = Number($('#jumlah_bulan').val());
    			var hasil = '';
    			var alert_hasil = '';
    			var besar_zakat_penghasilan = Number($('#besar_zakat_penghasilan').val().substr(3).replace(/,/g, ""));

    			if(total_zakat >= nishab){
    				hasil = total_zakat;

    				alert_hasil = 'Rp. '+hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    				alert_hasil2 = 'Rp. '+besar_zakat_penghasilan.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    				$('#total_zakat').val(alert_hasil);

    				if(hasil != 0){
    					alert("Zakat yang Harus Anda Bayar Adalah "+alert_hasil+", Klik Ok Untuk Melanjutkan !");
    				}else{
    					alert("Zakat yang Harus Anda Bayar Adalah "+alert_hasil2+", Klik Ok Untuk Melanjutkan !");
    				}
    				$('#zakat_penghasilan').submit();
    			}else{
    				alert("Anda Belum Wajib Zakat");
    				location.reload();
    			}
    		}
    		//End Zakat Penghasilan 


    		//Zakat Harta
    		function cek_perhitungan_2(){
    			var ceks  = document.getElementById('hide2');

    			if(ceks.style.display === "none"){ 
    				ceks.style.display  = "block";
    				$('#hidebesarharta').hide();
    				$('#besar_zakat2').attr('disabled', 'disabled');
    			}else{
    				ceks.style.display = "none";
    				$('#hidebesarharta').show();
    				$('#besar_zakat2').removeAttr('disabled');
    			}
    		}

    		function cek_persetujuan_2(){
    			var verifikasi = $("input[name='verifikasi']:checked").val();

    			if (verifikasi != null) {
    				$('#bayar2').removeAttr('disabled');
    			}else{
    				$('#bayar2').attr('disabled', 'disabled');
    			}
    		}

    		function besar_zakat_harta() {
    			var jumlah_emas  	 = Number($('#jumlah_emas').val());
    			var harga_emas       = Number(662000);

    			var jumlah_perak 	 = Number($('#jumlah_perak').val());
    			var harga_perak      = Number(13200);

    			var jumlah_uang  	 = Number($('#jumlah_uang').val().substr(3).replace(/,/g, ""));
    			var jumlah_properti  = Number($('#jumlah_properti').val().substr(3).replace(/,/g, ""));
    			var jumlah_kendaraan = Number($('#jumlah_kendaraan').val().substr(3).replace(/,/g, ""));
    			var jumlah_saham 	 = Number($('#jumlah_saham').val().substr(3).replace(/,/g, ""));
    			var jumlah_lainnya 	 = Number($('#jumlah_lainnya').val().substr(3).replace(/,/g, ""));
    			var kewajiban_hutang = Number($('#kewajiban_hutang').val().substr(3).replace(/,/g, ""));
    			var nisab_zakat_harta= Number(harga_emas*85);

    			var total_harta_kotor  = (jumlah_emas*harga_emas) + (jumlah_perak*harga_perak) 
    			+ jumlah_uang + jumlah_properti + jumlah_kendaraan + jumlah_saham + jumlah_lainnya;

    			var total_harta_bersih = total_harta_kotor - kewajiban_hutang;

    			$('#total_harta').val('Rp. '+total_harta_kotor.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    			$('#harta_zakat').val('Rp. '+total_harta_bersih.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    			$('#nisab_zakat_harta').val('Rp. '+nisab_zakat_harta.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    		}

    		function submit2(){
    			var harta_bersih = Number($('#harta_zakat').val().substr(3).replace(/,/g, ""));
    			var nishab = Number($('#nisab_zakat_harta').val().substr(3).replace(/,/g, ""));
    			var hasil = '';
    			var alert_harta = '';

    			if (harta_bersih >= nishab) {                    
    				hasil = harta_bersih * (2.5/100);
    				alert_harta = 'Rp. '+hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    				$('#harta_zakat').val(alert_harta);
    				alert("Zakat yang Harus Anda Bayar Adalah "+alert_harta+", Klik Ok Untuk Melanjutkan !");
    				$('#zakat_harta').submit();
    			}
    		}
    		//End Zakat Harta


    		//Zakat Periagaan
    		function cek_perhitungan_3(){
    			var ceks  = document.getElementById('hide3');

    			if(ceks.style.display === "none"){ 
    				ceks.style.display  = "block";
    				$('#besar_zakat3').attr('disabled', 'disabled');
    			}else{
    				ceks.style.display = "none";
    				$('#besar_zakat3').removeattr('disabled');
    			}
    		}

    		function cek_persetujuan_3(){
    			var verifikasi = $("input[name='verifikasi']:checked").val();

    			if (verifikasi != null) {
    				$('#bayar3').removeAttr('disabled');
    			}else{
    				$('#bayar3').attr('disabled', 'disabled');
    			}
    		}

    		function besar_zakat_perniagaan() {
    			var modal_setahun 		= Number($('#modal_setahun').val().substr(3).replace(/,/g, ""));
    			var pendapatan_tahunan	= Number($('#pendapatan_tahunan').val().substr(3).replace(/,/g, ""));
    			var nilai_dagangan 		= Number($('#nilai_dagangan').val().substr(3).replace(/,/g, ""));
    			var pengeluaran_uang    = Number($('#pengeluaran_uang').val().substr(3).replace(/,/g, ""));
    			var piutang_lancar      = Number($('#piutang_lancar').val().substr(3).replace(/,/g, ""));
    			var hutang 				= Number($('#hutang').val().substr(3).replace(/,/g, ""));
    			var harga_emas_niaga    = Number($('#harga_emas').val().substr(3).replace(/,/g, ""));
    			var qty_emas            = Number(85);
    			var nishab_niaga	    = harga_emas_niaga * qty_emas;

    			var total_perniagaan    = modal_setahun + pendapatan_tahunan + nilai_dagangan - pengeluaran_uang + piutang_lancar
    			- hutang;

    			$('#total_perniagaan').val('Rp. '+total_perniagaan.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    			$('#nisab_zakat_perniagaan').val('Rp. '+nishab_niaga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    		}

    		function submit3(){
    			alert("Berhasil Menghitung Zakat, Klik Ok Untuk Melanjutkan !");
    			$('#zakat_perniagaan').submit();
    		}
    		//End Zakat Perniagaan

    		//zakat fitrah
    		function cek_perhitungan_4(){
    			var ceks  = document.getElementById('hide4');

    			if(ceks.style.display === "none"){ 
    				ceks.style.display  = "block";
    				$('#hidebesarfitrah').hide();
    				$('#besar_zakat4').attr('disabled', 'disabled');
    			}else{
    				ceks.style.display = "none";
    				$('#hidebesarfitrah').show();
    				$('#besar_zakat4').removeAttr('disabled');
    			}
    		}

    		function cek_persetujuan_4(){
    			var verifikasi = $("input[name='verifikasi']:checked").val();

    			if (verifikasi != null) {
    				$('#bayar4').removeAttr('disabled');
    			}else{
    				$('#bayar4').attr('disabled', 'disabled');
    			}
    		}

    		function besar_zakat_fitrah() {
    			var harga_beras = Number($('#harga_beras_fitrah').val().substr(3).replace(/,/g, ""));
    			var qty_beras = Number(2.5);

    			var hasil = harga_beras * qty_beras;
    			$('#jumlah_zakat_fitrah').val('Rp. '+hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
    		}

    		function submit4(){
    			var harga_beras = Number($('#harga_beras_fitrah').val().substr(3).replace(/,/g, ""));
    			var qty_beras = Number(2.5);

    			var hasil = harga_beras * qty_beras;
    			var alert_fitrah = 'Rp. '+hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    			$('#jumlah_zakat_fitrah').val(alert_fitrah);
    			alert("Zakat yang Harus Anda Bayar Adalah "+alert_fitrah+", Klik Ok Untuk Melanjutkan !");
    			$('#zakat_fitrah').submit();
    		}
    	</script>

    	<script type="text/javascript">
    		function tandaPemisahTitik(b){
    			besar_zakat_penghasilan();
    			besar_zakat_harta();
    			besar_zakat_perniagaan();
    			besar_zakat_fitrah();

    			var _minus = false;
    			if (b<0) _minus = true;
    			b = b.toString();
    			b=b.replace(".","");
    			b=b.replace("-","");
    			c = "";
    			panjang = b.length;
    			j = 0;
    			for (i = panjang; i > 0; i--){
    				j = j + 1;
    				if (((j % 3) == 1) && (j != 1)){
    					c = b.substr(i-1,1) + "," + c;
    				} else {
    					c = b.substr(i-1,1) + c;
    				}
    			}
    			if (_minus) c = "-" + c ;
    			return 'Rp. '+c;
    		}

    		function numbersonly(ini, e){
    			if (e.keyCode>=49){
    				if(e.keyCode<=57){
    					a = ini.value.toString().replace(",","");
    					b = a.replace(/[^\d]/g,"");
    					b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
    					ini.value = tandaPemisahTitik(b);
    					return false;
    				}
    				else if(e.keyCode<=105){
    					if(e.keyCode>=96){
    						a = ini.value.toString().replace(",","");
    						b = a.replace(/[^\d]/g,"");
    						b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
    						ini.value = tandaPemisahTitik(b);
    						return false;
    					}
    					else {
    						return false;
    					}
    				}
    				else {
    					return false; 
    				}
    			}else if (e.keyCode==48){
    				a = ini.value.replace(",","") + String.fromCharCode(e.keyCode);
    				b = a.replace(/[^\d]/g,"");
    				if (parseFloat(b)!=0){
    					ini.value = tandaPemisahTitik(b);
    					return false;
    				} else {
    					return false;
    				}
    			}else if (e.keyCode==95){
    				a = ini.value.replace(",","") + String.fromCharCode(e.keyCode-48);
    				b = a.replace(/[^\d]/g,"");
    				if (parseFloat(b)!=0){
    					ini.value = tandaPemisahTitik(b);
    					return false;
    				} else {
    					return false;
    				}
    			}else if (e.keyCode==8 || e.keycode==46){
    				a = ini.value.replace(",","");
    				b = a.replace(/[^\d]/g,"");
    				b = b.substr(0,b.length -1);
    				if (tandaPemisahTitik(b)!=""){
    					ini.value = tandaPemisahTitik(b);
    				} else {
    					ini.value = "";
    				}

    				return false;
    			} else if (e.keyCode==9){
    				return true;
    			} else if (e.keyCode==17){
    				return true;
    			} else {
    				return false;
    			}
    		}

    		function tandaPemisahTitikNonRp(b){
    			besar_zakat_penghasilan();
    			besar_zakat_harta();
    			besar_zakat_perniagaan();
    			besar_zakat_fitrah();

    			var _minus = false;
    			if (b<0) _minus = true;
    			b = b.toString();
    			b=b.replace(".","");
    			b=b.replace("-","");
    			c = "";
    			panjang = b.length;
    			j = 0;
    			for (i = panjang; i > 0; i--){
    				j = j + 1;
    				if (((j % 3) == 1) && (j != 1)){
    					c = b.substr(i-1,1) + "," + c;
    				} else {
    					c = b.substr(i-1,1) + c;
    				}
    			}
    			if (_minus) c = "-" + c ;
    			return c;
    		}

    		function numbersonlyNonRp(ini, e){
    			if (e.keyCode>=49){
    				if(e.keyCode<=57){
    					a = ini.value.toString().replace(",","");
    					b = a.replace(/[^\d]/g,"");
    					b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
    					ini.value = tandaPemisahTitikNonRp(b);
    					return false;
    				}
    				else if(e.keyCode<=105){
    					if(e.keyCode>=96){
    						a = ini.value.toString().replace(",","");
    						b = a.replace(/[^\d]/g,"");
    						b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
    						ini.value = tandaPemisahTitikNonRp(b);
    						return false;
    					}
    					else {
    						return false;
    					}
    				}
    				else {
    					return false; 
    				}
    			}else if (e.keyCode==48){
    				a = ini.value.replace(",","") + String.fromCharCode(e.keyCode);
    				b = a.replace(/[^\d]/g,"");
    				if (parseFloat(b)!=0){
    					ini.value = tandaPemisahTitikNonRp(b);
    					return false;
    				} else {
    					return false;
    				}
    			}else if (e.keyCode==95){
    				a = ini.value.replace(",","") + String.fromCharCode(e.keyCode-48);
    				b = a.replace(/[^\d]/g,"");
    				if (parseFloat(b)!=0){
    					ini.value = tandaPemisahTitikNonRp(b);
    					return false;
    				} else {
    					return false;
    				}
    			}else if (e.keyCode==8 || e.keycode==46){
    				a = ini.value.replace(",","");
    				b = a.replace(/[^\d]/g,"");
    				b = b.substr(0,b.length -1);
    				if (tandaPemisahTitikNonRp(b)!=""){
    					ini.value = tandaPemisahTitikNonRp(b);
    				} else {
    					ini.value = "";
    				}

    				return false;
    			} else if (e.keyCode==9){
    				return true;
    			} else if (e.keyCode==17){
    				return true;
    			} else {
    				return false;
    			}
    		}
    	</script>
    </body>
    </html>