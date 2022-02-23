<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; padding-top: 0 !important">
	<div class="container" id="container_detail" style="padding: 20px;">
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-6 col-sm-12">
				<div class="img-home">
					<img src="https://derma-express.com/assets/admin/assets/media/derma_treatment/500/{{ $data->image }}" style="margin-bottom:20px;width: 100%; background-color: #ffffff; background-size: contain;background-repeat: no-repeat; background-position: center; border-radius: 10px;">
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				{!! $data->$related->$column !!}

				<a href="https://wa.me/message/NWV7N73Q5VWDD1" class="btn-submenu" style="width: 100%; border-radius: 5px; float: right" target="_blank">Buat Janji Sekarang</a>
			</div>
		</div>
	</div>
</div>