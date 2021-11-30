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
					<div class="kt-portlet">
						<div class="kt-portlet__body  kt-portlet__body--fit">
							<div class="row row-no-padding row-col-separator-lg">
								<div class="col-md-12 col-lg-4 col-xl-4">

									<!--begin::Total Profit-->
									<div class="kt-widget24">
										<div class="kt-widget24__details">
											<div class="kt-widget24__info">
												<h4 class="kt-widget24__title">
													Total
												</h4>
												<span class="kt-widget24__desc">
													Pengunjung
												</span>
											</div>

										</div>
										<div class="kt-widget24__action">
											<span class="kt-widget24__stats kt-font-brand" style="font-size: 20px;margin-top: 20px;">
												{{$pengunjung->total_pengunjung}}
											</span>
										</div>
									</div>

									<!--end::Total Profit-->
								</div>
								<div class="col-md-12 col-lg-4 col-xl-4">

									<!--begin::New Feedbacks-->
									<div class="kt-widget24">
										<div class="kt-widget24__details">
											<div class="kt-widget24__info">
												<h4 class="kt-widget24__title">
													Total
												</h4>
												<span class="kt-widget24__desc">
													Treatments
												</span>
											</div>
										</div>
										<div class="kt-widget24__action">
											<span class="kt-widget24__stats kt-font-warning" style="font-size: 20px;margin-top: 20px;">
												{{$treatment->total_treatment}}
											</span>
										</div>
									</div>

									<!--end::New Feedbacks-->
								</div>
								<div class="col-md-12 col-lg-4 col-xl-4">

									<!--begin::New Orders-->
									<div class="kt-widget24">
										<div class="kt-widget24__details">
											<div class="kt-widget24__info">
												<h4 class="kt-widget24__title">
													Total
												</h4>
												<span class="kt-widget24__desc">
													Product
												</span>
											</div>
										</div>
										<div class="kt-widget24__action">
											<span class="kt-widget24__stats kt-font-danger" style="font-size: 20px; margin-top: 15px;">
												{{$product->total_product}}
											</span>
										</div>
									</div>

									<!--end::New Orders-->
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection