<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; padding-top: 0 !important">
	<div class="container" id="container_detail">
		<div class="row" style="margin-top: 70px;">
			<div class="col-md-4 col-sm-12">
				<div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px; background-color: #ffffff; background-image: url('https://derma-express.com/assets/admin/assets/media/derma_treatment/500/{{ $data->image }}'); background-size: contain;background-repeat: no-repeat;   background-position: center;">
				</div>
			</div>
			<div class="col-md-8 col-sm-12">
				<a href="https://wa.me/message/NWV7N73Q5VWDD1" class="btn btn-info pull-rightu" style="width: 130px; float: right;" target="_blank">Buat Janji</a><br>
				{!! $data->$related->$column !!}
			</div>
		</div>
	</div>
</div>