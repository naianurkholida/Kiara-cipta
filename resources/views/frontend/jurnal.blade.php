@extends('frontend.component.master')
@section('header')

<meta name="description" content="List Jurnal Derma Express.">
<link rel="canonical" href="https://derma-express.com/jurnal">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/jurnal" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Kegiatan dan Info Terbaru Derma di Sini." />

<title>Jurnal</title>

<style type="text/css">
    .pagination {
        margin-left: auto;
        margin-right: auto;
        width: 25%;
    }

    @media only screen and (max-width: 600px) {
        .pagination {
            width: 85% !important;
        }
    }

</style>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0; padding-top: 0;">
    <div class="breadcrumb-page"
        style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }});">
        <div class="overlay-breadcrumb"></div>
        <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Jurnal</h2>
    </div>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" style="font-size: 8px !important;"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" style="font-size: 8px !important;" aria-current="page">Jurnal</li>
            </ol>
        </nav>
        <br /><br />
    </div>
    <div class="container">
        @foreach($data as $row)
            <center>
                <div class="box-jurnal" style="text-align: left !important;">
                <img class="img-jurnal"
                    src="{{ asset('assets/admin/assets/media/posting/') }}/{{ $row->image }}"
                    alt="{{ $row->getPostingLanguage->judul }}" style="border-radius: 10px;">
                <a
                    href="{{ route('dermaster.jurnal.show', $row->getPostingLanguage->seo) }}">
                    <p id="dokter-name">{{ $row->getPostingLanguage->judul }}</p>
                </a>
                <p style="margin-bottom:10 !important;">{!! Helper::removeTags($row->getPostingLanguage->content) !!}
                </p>
                <a class="readmore-jurnal"
                    href="{{ route('dermaster.jurnal.show', $row->getPostingLanguage->seo) }}">
                    Read More
                </a>
            </div>
            </center>
        @endforeach

        <div class="row">
            <div class="col-lg-12">
                    {{ $data->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
