<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<title>Notifikasi | Mizan Amanah</title>

</head>

<body class="stretched">

    <!-- Document Wrapper
    	============================================= -->
    	<div id="" class="clearfix">

        <!-- Header
        	============================================= -->
        	@include('front_page.theme1.main_layouts.header')
        	<!-- #header end -->

        <!-- Slider
        	============================================= -->
        	<div class="container clearfix">
        		<div class="row justify-content-center" style="margin-top: 50px;">
        			<div class="col-md-7 center">
        				<div class="heading-block nobottomborder mb-4">
        					<h3 class="mb-4 nott">@lang('language.notifikasi_transaksi')</h3>
        				</div>
        				<div class="svg-line bottommargin-sm clearfix">
        					<hr style="background-color: red; height: 1px; width: 200px;">
        				</div>
        			</div>
        		</div>
        	</div>

        <!-- Content
        	============================================= -->
        	<section id="content">
        		<div class="row">
        			<div class="col-md-12">
        				<div class="feature-box fbox-center fbox-plain">
        					<div class="fbox-icon">
        						<a href="#"><i class="icon-bell2"></i></a>
        					</div>
        				</div>
        			</div>

        			<div class="container clearfix">
        				<div class="row">
        					@foreach($bank as $row)
        					<div class="col-md-3">
        						<div class="form-check">
        							<p class="form-check-label" for="">
        								{{$row->nama_bank}}<br>
        								{{$row->alamat}}<br>
        								{{$row->atas_nama}}<br>
        								{{$row->no_rekening}}
        							</p><hr>
        						</div>
        					</div>
        					@endforeach
        				</div>
        				<div class="col-md-12">
        					<table class="table table-striped">
        						<tr>
        							<th>Nomor Invoice</th>
        							<td>{{$data->mid_order_id}}</td>
        						</tr>
        						<tr>
        							<th>Nama Program</th>
        							<td>{{$data->judul}}</td>
        						</tr>
        						<tr>
        							<th>Total Donasi</th>
        							<td>{{'Rp. '.number_format($data->total_donasi)}}</td>
        						</tr>
        						<tr>
        							<th>Nama Pengirim</th>
        							<td>{{$data->nama_lengkap}}</td>
        						</tr>
        						<tr>
        							<th>Metode Pembayaran</th>
        							<td>{{$data->metode_pembayaran}}</td>
        						</tr>
        					</tr>
        				</table>
        			</div>
        		</div>

        		<div class="container clearfix">
        			<div class="col-md-12">
        				<hr>
        				<h4>METODE PEMBAYARAN</h4>
        				<label>1. Pembayaran Online</label>
        				<p>Anda dapat melakukan donasi secara online di website Mizanamanah.or.id. Pilih Metode Pembayaran Virtual Account (Minimal donasi Rp 10.000).</p>
        				<label>2. Manual Transfer</label>
        				<p>Anda juga dapat melakukan pembayaran dengan mentransfer biaya tertagih ke salah satu rekening di bawah ini. Setelah melakukan pembayaran via transfer, silakan lakukan konfirmasi pembayaran di akun website Mizanamanah.or.id. Klik tautan berikut untuk melakukan konfirmasi.</p>
        			</div>
        		</div>

        		<div class="col-md-12 center">
        			<a href="{{Route('konfirmasi.pembayaran',$data->mid_order_id)}}">
        				<button type="button" class="btn btn-danger btn-sm">KONFIRMASI PEMBAYARAN</button>
        			</a>
        			<br><br>
        		</div>
        	</div>
        </section>

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


    </body>

    </html>