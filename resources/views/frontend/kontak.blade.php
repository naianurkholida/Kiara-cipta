@extends('frontend.component.master')

@section('header')
<meta name="description" content="Contact Derma Express.">
<link rel="canonical" href="https://derma-express.com/kontak">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/kontak" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Kamu Bisa Menghubungi Kami di Kontak Tercantum." />

<title>Kontak</title>
@endsection

@section('content')
<div class="breadcrumb-page"
    style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }});">
    <div class="overlay-breadcrumb"></div>
    <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Kontak</h2>
</div>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" style="font-size: 8px !important;"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" style="font-size: 8px !important;" aria-current="page">Kontak</li>
        </ol>
    </nav>
    <br /><br />
</div>
<div class="container" style="margin-top: 0;padding-left: 100px;padding-right: 110px;">

    <div class="section nobg nobottommargin clearfix" style="margin-top: 0; padding-top: 0;">

        @include('component.alert.global')
        <div class="container-kontak">
            <div class="box-kontak">
                <h3 class="text-center">Hubungi Kami</h3>
                <form method="POST" action="{{ route('inbox.post') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control text-center" id="exampleFormControlInput1"
                            placeholder="Nama Lengkap" name="name" style="border-radius: 10px;width:100%;">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control text-center" id="exampleFormControlInput1"
                            placeholder="Masukan alamat email" name="email" style="border-radius: 10px;width:100%;">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="inbox"
                            style="border-radius: 10px;width:100%;"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" style="width: 200px;">Kirim</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>
        <center>
            <h3 class="text-center">Lokasi Derma Express</h3><br>
        </center>

        <div class="container-flex">
            @foreach(Helper::profile_cabang() as $value)
                <div class="item-kontak" style="padding: 10px; margin-bottom:10px;">
                    <b>{{ $value->name }}</b><br><br>
                    {{ $value->address }}<br>

                    @foreach($value->detail as $detail)
                        @if($detail->type == 'phone')
                            <i class="icon-phone-sign"></i>
                        @elseif($detail->type == 'wa')
                            <i class="icon-whatsapp-square"></i>
                        @elseif($detail->type == 'operational')
                            <i class="icon-clock"></i>
                        @elseif($detail->type == 'map')
                            <i class="icon-map"></i>
                        @endif

                        @if($detail->type != 'map')
                            {{ $detail->value }}<br>
                        @else
                            <a href="{{ $detail->value }}" target="_blank">Lihat Lokasi</a>
                        @endif
                    @endforeach
                    <br>
                </div>
            @endforeach

            <div class="item-kontak">
                <b>Kontak Kami</b><br><br>
                <i class="icon-whatsapp-square"></i> 0822 58883050<br><br>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')
<script>
    if (window.matchMedia('(max-width: 425px)')) {
        $("#container_dalem").removeClass("container");
    } else {
        $("#container_dalem").addClass("container");
    }

</script>
@endsection
