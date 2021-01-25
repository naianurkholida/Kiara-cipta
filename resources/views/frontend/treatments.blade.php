@extends('frontend.component.master')

@section('header')
<meta name="description" content="Treatments List Derma Express.">

<link rel="canonical" href="http://derma-express.com/treatments">

<title>Treatments List Derma Express</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">Treatment</h3>
        </div>
    </div>
    <div class="container container-flex">
        @foreach($data as $row)
            <div class="box-dokter" style="min-height: 441px;">
                <div class="img-dokter" style="background-image: url({{ $row->getFirstMediaUrl('treatment') }});"></div>
                <a href="{{ route('dermaster.treatments.show', $row->getTreatmentLanguage->seo) }}">
                    <p id="dokter-name">
                        {{ $row->getTreatmentLanguage->judul }}
                    </p>
                </a>
                <p style="margin-bottom:10 !important;">{!! Helper::removeTags($row->getTreatmentLanguage->deskripsi) !!}</p>
            </div>
        @endforeach
    </div>

</div>
@endsection