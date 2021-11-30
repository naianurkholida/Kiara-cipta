@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
	<div class="container clearfix">
		<div class="heading-block center noborder" data-heading="O">
			<h3 class="nott ls0">Price List</h3>
		</div>
	</div>
	<div class="container" id="container_luar">
		<div class="container" id="container_dalem">
			<div class="text-center">
				{!! $image->konten_page !!}
			</div>
		</div>
	</div>

</div>
@endsection

@section('js')
    <script>
        if (window.matchMedia('(max-width: 425px)'))
        {
            $( "#container_dalem" ).removeClass("container");
            $( "#container_luar" ).removeClass("container").addClass("container-fluid");
        } else {
            $( "#container_dalem" ).addClass("container");
            $( "#container_luar" ).removeClass("container-fluid").addClass("container");
        }
    </script>
@endsection