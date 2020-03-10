@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">Treatments</h3>
        </div>
    </div>
    <div class="container" id="container-luar">
        <div class="container" id="container-dalem">
            @include('frontend.component.layouts.item-detail', ['related' => 'getTreatmentLanguage', 'column' => 'deskripsi','image' => 'treatment'])
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
            $( "#container_detail" ).removeClass("container");
        } else {
            $( "#container_dalem" ).addClass("container");
            $( "#container_detail" ).addClass("container");
            $( "#container_luar" ).removeClass("container-fluid").addClass("container");
        }
    </script>
@endsection