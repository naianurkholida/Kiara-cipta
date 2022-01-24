@extends('component.layouts.master')

@section('content')
<div class="card">
	<div class="card-header">
		<h4>Dashboard Customer</h4>
	</div>
	<div class="card-body">
		<form action="{{ Route('setup.store_dashboard') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-body">
					<span style="font-weight: bold;">BENEFITS</span><hr>
					<div style="display: flex; width: 100%;">
						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $benefit_1->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="benefit_1" id="benefit_1">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar2" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $benefit_2->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="benefit_2" id="benefit_2">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar3" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $benefit_3->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="benefit_3" id="benefit_3">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar4" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $benefit_4->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="benefit_4" id="benefit_4">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar5" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $benefit_5->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="benefit_5" id="benefit_5">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="card" style="margin-top: 10px;">
				<div class="card-body">
					<span style="font-weight: bold;">MEMBERSHIP LEVEL</span><hr>

					<div style="display: flex; width: 100%;">
						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar6" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $membership_1->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="membership_1" id="membership_1">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar7" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $membership_2->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="membership_2" id="membership_2">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar8" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $membership_3->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="membership_3" id="membership_3">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar9" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $membership_4->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="membership_4" id="membership_4">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card" style="margin-top: 10px;">
				<div class="card-body">
					<span style="font-weight: bold;">HOW TO GET POINTS</span><hr>

					<div style="display: flex; width: 100%;">
						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar10" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $how_to_get_1->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="how_to_get_1" id="how_to_get_1">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar11" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $how_to_get_2->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="how_to_get_2" id="how_to_get_2">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 20%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar12" style="width: 180px; height: 180px;">
								<div class="kt-avatar__holder" style="width: 180px; height: 180px; background: url('{{ asset($path) }}/{{ $how_to_get_3->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="how_to_get_3" id="how_to_get_3">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

					</div>
				</div>
			</div>

			<div class="card" style="margin-top: 10px;">
				<div class="card-body">
					<span style="font-weight: bold;">MENU ICONS</span><hr>

					<div style="display: flex; width: 100%;">
						<div style="width: 13%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar13" style="width: 100px; height: 100px;">
								<div class="kt-avatar__holder" style="width: 100px; height: 100px; background: url('{{ asset($path) }}/{{ $icon_1->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="icon_1" id="icon_2">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 13%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar14" style="width: 100px; height: 100px;">
								<div class="kt-avatar__holder" style="width: 100px; height: 100px; background: url('{{ asset($path) }}/{{ $icon_2->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="icon_2" id="icon_2">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 13%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar15" style="width: 100px; height: 100px;">
								<div class="kt-avatar__holder" style="width: 100px; height: 100px; background: url('{{ asset($path) }}/{{ $icon_3->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="icon_3" id="icon_3">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 13%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar16" style="width: 100px; height: 100px;">
								<div class="kt-avatar__holder" style="width: 100px; height: 100px; background: url('{{ asset($path) }}/{{ $icon_4->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="icon_4" id="icon_4">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 13%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar17" style="width: 100px; height: 100px;">
								<div class="kt-avatar__holder" style="width: 100px; height: 100px; background: url('{{ asset($path) }}/{{ $icon_5->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="icon_5" id="icon_5">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>

						<div style="width: 13%;">
							<div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar18" style="width: 100px; height: 100px;">
								<div class="kt-avatar__holder" style="width: 100px; height: 100px; background: url('{{ asset($path) }}/{{ $icon_5->icon  }}');"></div>
								<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
									<i class="fa fa-pen"></i>
									<input type="file" name="icon_6" id="icon_6">
								</label>
								<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
									<i class="fa fa-times"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12"><br>
					<button type="submit" class="btn btn-info pull-right">Simpan</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('assets/admin/assets/js/demo5/pages/custom/user/add-user.js')}}" type="text/javascript"></script>	
<script type="text/javascript">

</script>
@endsection