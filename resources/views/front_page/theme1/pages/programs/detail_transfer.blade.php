<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
	<!--css include from main_layouts-->
	@include('front_page.theme1.main_layouts.css')
	<!--end css-->
	<title>Konfirmasi Pembayaran | Mizan Amanah</title>

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
        					<h3 class="mb-4 nott">Konfirmasi Pembayaran</h3>
        				</div>
        				<div class="svg-line bottommargin-sm clearfix">
        					<hr style="background-color: red; height: 1px; width: 250px;">
        				</div>
        			</div>
        		</div>
        	</div>

        <!-- Content
        	============================================= -->
        	<section id="content" style="overflow: visible">
        		<div class="container clearfix">
        			<div class="row">
        				<div class="col-md-12">
        					<form id="submit-pay" action="{{Route('konfirmasi.pay')}}" method="post" enctype="multipart/form-data">
        						{{csrf_field()}}
        						<div class="row">
        							<div class="col-md-12">
        								<label>Payment Account To Do Here ...</label>
        							</div>
        							@foreach($bank as $row)
        							<div class="col-md-3">
        								<div class="form-check">
        									<input class="form-check-input" type="radio" value="{{$row->id}}" id="defaultCheck1" name="id_bank">
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
        						<div class="row">
        							<div class="col-md-12">
        								<label>Nomor Invoice</label>
        								<input type="text" name="id_uniq" class="form-control" id="nomer_invoice" onchange="cek_data_invoice()" value="{{$data->mid_order_id}}">
        							</div>
        						</div>
        						<br>
        						<div class="row">
        							<div class="col-md-12">
        								<label>Nama Program</label>
        								<input type="hidden" name="id_program" id="id_program" value="{{$data->programid}}">
        								<input type="text" class="form-control" name="nama_program" id="nama_program" value="{{$data->judul}}">
        							</div>
        						</div>
        						<br>
        						<div class="row">
        							<div class="col-md-12">
        								<label>Total</label>
        								<input type="text" name="total" class="form-control" id="total" value="{{'Rp. '.$total_donasis}}">
        							</div>
        						</div>
        						<br>
        						<div class="row">
        							<div class="col-md-12">
        								<label>Bank Pengirim</label>
        								<input type="text" name="bank_pengirim" class="form-control" id="bank_pengirim">
        							</div>
        						</div>
        						<br>
        						<div class="row">
        							<div class="col-md-12">
        								<label>Total Submit</label>
        								<input type="text" name="total_submit" class="form-control" id="total_submit">
        							</div>
        						</div>
        						<br>
        						<div class="row">
        							<div class="col-md-12">
        								<label>Tanggal Konfirmasi</label>
        								<input type="text" name="tanggal_konfirmasi" class="form-control" id="tanggal_konfirmasi" data-date-format="yyyy-mm-dd" autocomplete="off" value="<?=date('Y-m-d')?>">
        							</div>
        						</div>
        						<br>
        						<div class="row">
        							<div class="col-md-12">
        								<label>Nama Pengirim</label>
        								<input type="text" name="nama_pengirim" class="form-control" id="nama_pengirim" value="{{$data->nama_lengkap}}">
        							</div>
        						</div>
        						<br>
        						<div class="row">
        							<div class="col-md-12">
        								<label>Upload Bukti Pembayaran</label>
        								<input type="file" name="berkas" class="form-control-file" id="berkass">
        							</div>
        						</div>
        						<br>
        						<div class="row">
        							<div class="col-md-12">
        								<br>
        								<button type="button" class="btn btn-danger" style="width: 100%;" onclick="simpan()">Konfirmasi Pembayaran</button>
        							</div>
        						</div>
        					</form>
        				</div>
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

    <script type="text/javascript">
        function cek_data_invoice(){
            var nomer_invoice = $('#nomer_invoice').val();
            $.ajax({
                type : 'GET',
                dataType : 'json',
                url : '{{url("/get-invoice")}}/'+nomer_invoice,
                success : function(data){
                    console.log(data)
                    $('#id_program').val(data.programid);
                    $('#nama_program').val(data.judul);
                    $('#total').val('Rp. '+data.total_donasi.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."));
                    $('#nama_pengirim').val(data.nama_lengkap);
                }
            });
        }

    	function simpan(){
    		var validation = 0;
    		var validationText = "";

    		if($("#nama_pengirim").val()==''){ validation++; validationText = validationText + "Nama Pengirim tidak boleh kosong\n"; }
    		if($("#bank_pengirim").val()==''){ validation++; validationText = validationText + "Bank tidak boleh kosong\n"; }
    		if($("#total_submit").val()==''){ validation++; validationText = validationText + "Total Submit tidak boleh kosong\n"; }
    		if($("#berkas").val()==''){ validation++; validationText = validationText + "Bukti Pembayaran tidak boleh kosong\n"; }

    		if(validation>0){
    			alert(validationText);
    		} else {
    			alert('Berhasil Melakukan Konfirmasi, silahkan Tunggu Admin Menyetujui');
    			$("#submit-pay").submit();
    		}
    	}

    	var rupiah = document.getElementById('total_submit');
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
    </script>

    </html>