@extends('frontend.component.master')

@section('header')
<meta name="description" content="Treatments List Derma Express.">
<link rel="canonical" href="https://derma-express.com/treatments">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/treatments" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Kamu Bisa Cek Treatment Apa Saja yang Tersedia di Derma Express." />

<title>Treatments List Derma Express</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0; padding-top:0px;">
    <div class="breadcrumb-page" style="background-image: url({{ asset('assets/image/bg-paralax.jpg') }});">
        <div class="overlay-breadcrumb"></div>
        <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Treatments</h2>
    </div>
    <!-- <div class="container clearfix">
        <div class="heading-block center noborder" data-heading="O">
            <h3 class="nott ls0">Treatments</h3>
        </div>
    </div> -->
    <div class="container container-flex">
        @foreach($data as $row)
            <div class="box-dokter" style="min-height: 441px;">
                <div class="img-dokter" style="background-image: url({{ asset('assets/admin/assets/media/derma_treatment') }}/{{$row->image}});"></div>
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