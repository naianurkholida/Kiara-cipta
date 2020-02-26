<div id="copyrights" class="">
	<div class="container clearfix">
		<div class="row justify-content-between align-items-center">
			<div class="col-md-4" style="color: white;">
				Copyrights © {{date('Y')}} All Rights Reserved by Mizan Amanah.<br>
			</div>

			<div class="col-md-8 d-md-flex flex-md-column align-items-md-end mt-4 mt-md-0">
				<div class="copyrights-menu copyright-links clearfix">
					@foreach($footer as $foot)

						@if($foot->judul_menu == "Tentang" || $foot->judul_menu == "About")
						<a href="{{url('profile')}}">{{$foot->judul_menu}}</a>
						@endif

						@if($foot->judul_menu == "Rekening Donasi" || $foot->judul_menu == "Donasi Account")
						<a href="{{url('rekening-donasi')}}">{{$foot->judul_menu}}</a> 
						@endif

						@if($foot->judul_menu == "Kontak" || $foot->judul_menu == "Contact")
						<a href="{{url('kontak')}}">{{$foot->judul_menu}}</a>
						@endif

						@if($foot->judul_menu == "Kantor Cabang" || $foot->judul_menu == "Office Branch")
						<a href="{{url('kantor-cabang')}}">{{$foot->judul_menu}}</a>
						@endif

						@if($foot->judul_menu == "Syarat dan Ketentuan" || $foot->judul_menu == "Term and Condition")
						@endif
					@endforeach
				</div>

				<div style="float: left;">
					<ul class="nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
								<span style="color: white;">Syarat dan Ketentuan</span>
							</a>
							<ul class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
								@foreach($footer as $foot)
									@if($foot->judul_menu == "Syarat dan Ketentuan" || $foot->judul_menu == "Term and Condition")
										<a class="dropdown-item" href="{{url('syarat&ketentuan')}}">{{$foot->judul_menu}}</a>
									@endif

									@if($foot->judul_menu == "Ketentuan Privasi" || $foot->judul_menu == "Privacy Policy")
										<a class="dropdown-item" href="{{url('ketentuan&privasi')}}">{{$foot->judul_menu}}</a>
									@endif

									@if($foot->judul_menu == "Kebijakan Refund" || $foot->judul_menu == "Refund Policy")
										<a class="dropdown-item" href="{{url('kebijakan-refund')}}">{{$foot->judul_menu}}</a>
									@endif
								@endforeach
							</ul>
						</li>
					</ul>
				</div>				
			</div>
		</div>
	</div>
</div>