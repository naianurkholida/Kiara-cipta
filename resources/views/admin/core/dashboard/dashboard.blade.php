@extends('component.layouts.master')

@section('content')

	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="row">
			<div class="col-lg-12">

				<div class="kt-portlet kt-portlet--tab">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon kt-hidden">
								<i class="la la-gear"></i>
							</span>
							<h3 class="kt-portlet__head-title">
								Guest Statistics
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div id="kt_morris_1" style="height:500px;"></div>	
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection