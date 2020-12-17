@extends('frontend.component.master')

@section('header')
<meta name="description" content="Contact Derma Express.">

<link rel="canonical" href="http://derma-express.com/kontak">

<title>Kontak</title>
@endsection

@section('content')
<div class="container" style="margin-top: 0;padding-left: 80px;padding-right: 90px;">
    <div class="section nobg nobottommargin clearfix" style="margin-top: 0;">

        <div class="container" id="container_luar">
            <div class="container" id="container_dalem">
            @include('component.alert.global')
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-center">Hubungi Kami</h3>
                        <form method="POST" action="{{ route('inbox.post') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control text-center" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="name" style="border-radius: 10px;">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control text-center" id="exampleFormControlInput1" placeholder="Masukan alamat email" name="email" style="border-radius: 10px;">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="inbox" style="border-radius: 10px;"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <!-- {!! $content->konten_page !!} -->
                        <h1 class="text-center">Lokasi Derma Express</h1><br>

                        <b>Tawakal</b><br><br>
                        Jl. Tawakal Ujung No.C-1. Tomang, Petamburan, Jakarta Barat.<br> 
                        <i class="icon-phone-sign"></i> 02121251383<br>
                        <i class="icon-whatsapp-square"></i> 082260027800<br><br>

                        <b>Utan Kayu</b><br><br>
                        Jl. Utan Kayu Raya No.79B dan 79C, Jakarta Timur.<br>
                        <i class="icon-phone-sign"></i> 02122897879<br>
                        <i class="icon-phone-sign"></i> 02122895170<br>
                        <i class="icon-whatsapp-square"></i> 0821 33554191<br><br>

                        <b>GadingSerpong</b><br><br>
                        Ruko Diamond III No 12-15, Jl. Gading Golf Boulevard, Gading Serpong,Pakulonan Barat, Kelapa dua Kota Tangerang, Banten.<br>
                        <i class="icon-phone-sign"></i> 02154214764<br>
                        <i class="icon-phone-sign"></i> 02154214756<br>
                        <i class="icon-phone-sign"></i> 02154214758<br>
                        <i class="icon-whatsapp-square"></i> 0821 33554192<br><br>

                        <b>Kontak Kami</b><br>
                        <i class="icon-whatsapp-square"></i> 0822 58883050<br><br>
                        
                        <b>Jam Operasional</b><br><br>
                        <b>Tawakal</b><br>
                        Senin - Minggu : 10:00 - 17.00 WIB<br><br>

                        <b>Utan kayu</b><br>
                        Senin – Minggu : 10:00 - 17:00 WIB<br><br>

                        <b>Serpong</b><br>
                        Senin - Jumat : 11:00 - 19:00 WIB<br>
                        Sabtu - Minggu : 10:00 - 18:00 WIB<br>
                    </div>
                </div>
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
        } else {
            $( "#container_dalem" ).addClass("container");
        }
    </script>
@endsection