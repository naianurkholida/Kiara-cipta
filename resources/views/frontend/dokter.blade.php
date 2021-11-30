@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">Dokter</h3>
        </div>
    </div>
    <div class="container">
        <div class="container">
            <div class="row">
                @foreach($data as $row)
                    <div class="col-md-3" style="text-align: center;margin-bottom: 20px;">
                        <div class="box-dokter">
                            <div class="img-dokter" style="background-image: url({{ $row->getFirstMediaUrl('dokter') }});"></div>
                            <a href="{{ route('dermaster.dokter.show', str_replace(' ', '-', $row->name)) }}"><p id="dokter-name">{{ $row->name }}</p></a>
                            <p style="margin-bottom:10 !important;">{{ $row->getCategory->category }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection