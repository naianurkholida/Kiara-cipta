@extends('frontend.component.master')

@section('header')
<meta name="description" content="Event List Derma Express.">
<link rel="canonical" href="https://derma-express.com/events">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/event" />
<meta property="og:title" content="Promo Derma Express" />
<meta property="og:description" content="Kamu Bisa Cek Promo Apa Saja yang Tersedia di Derma Express." />

<title>Promo Derma Express</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0; padding-top: 0;">
    <div class="breadcrumb-page"
        style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }}); background-size: contain;">
        <div class="overlay-breadcrumb"></div>
        <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Promo</h2>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Promo</li>
            </ol>
        </nav>
        <br /><br />
    </div>
    <div class="container container-flex">
        @foreach($data as $row)
            <div class="box-dokter" style="min-height: 320px;">
                <div class="img-dokter"
                    style="background-image: url('{{ asset('assets/admin/assets/media/posting') }}/{{ $row->image }}');">
                </div>
                <a
                    href="{{ route('dermaster.event.show', $row->getPostingLanguage->seo) }}">
                    <p id="dokter-name">
                        {{ $row->getPostingLanguage->judul }}
                    </p>
                </a>
                <p style="margin-bottom:10 !important;">{!! Helper::removeTags($row->getPostingLanguage->content) !!}
                </p>
            </div>
        @endforeach
    </div>

</div>
@endsection
