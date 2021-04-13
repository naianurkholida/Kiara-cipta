@extends('frontend.component.master')

@section('header')
<meta name="description" content="Contact Derma Express.">
<link rel="canonical" href="https://derma-express.com/kontak">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/kontak" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Kamu Bisa Menghubungi Kami di Kontak Tercantum." />

<title>Kontak</title>
@endsection

@section('content')
<div class="container" style="margin-top: 0;padding-left: 100px;padding-right: 110px;">
    <div class="section nobg nobottommargin clearfix" style="margin-top: 0;">

            @include('component.alert.global')
                <div class="container-kontak">
                    <div class="box-kontak">
                        <h3 class="text-center">Hubungi Kami</h3>
                        <form method="POST" action="{{ route('inbox.post') }}">
                            @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control text-center" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="name" style="border-radius: 10px;width:100%;">
                                </div> 
                                <div class="form-group">
                                    <input type="email" class="form-control text-center" id="exampleFormControlInput1" placeholder="Masukan alamat email" name="email" style="border-radius: 10px;width:100%;">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="inbox" style="border-radius: 10px;width:100%;"></textarea>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" style="width: 200px;">Kirim</button>
                                </div>
                        </form>
                    </div>
                </div>
                <center><h3 class="text-center">Lokasi Derma Express</h3><br></center>
                <div class="container-flex">
                        
                        <div class="item-kontak">
                        <b>Tawakal</b><br><br>
                        Jl. Tawakal Ujung No.C-1. Tomang, Petamburan, Jakarta Barat.<br> 
                        <i class="icon-phone-sign"></i> 02121251383<br>
                        <i class="icon-whatsapp-square"></i> 082260027800<br>
                        <i class="icon-clock"></i> Senin - Sabtu : 11:00 - 20.00 WIB<br>
                        <i class="icon-clock"></i> Minggu : 10:00 - 17.00 WIB<br><br>
                        </div>
                        <div class="item-kontak">
                        <b>Utan Kayu</b><br><br>
                        Jl. Utan Kayu Raya No.79B dan 79C, Jakarta Timur.<br>
                        <i class="icon-phone-sign"></i> 02122897879<br>
                        <i class="icon-phone-sign"></i> 02122895170<br>
                        <i class="icon-whatsapp-square"></i> 0821 33554191<br>
                        <i class="icon-clock"></i> Senin - Sabtu : 11:00 - 20.00 WIB<br>
                        <i class="icon-clock"></i> Minggu : 10:00 - 17.00 WIB<br><br>
                        </div>
                        <div class="item-kontak">
                        <b>Gading Serpong</b><br><br>
                        Ruko Diamond III No 12-15, Jl. Gading Golf Boulevard, <br>
                        Gading Serpong, Pakulonan Barat, Kelapa dua Kota Tangerang, Banten.<br>
                        <i class="icon-phone-sign"></i> 02154214764<br>
                        <i class="icon-phone-sign"></i> 02154214756<br>
                        <i class="icon-phone-sign"></i> 02154214758<br>
                        <i class="icon-whatsapp-square"></i> 0821 33554192<br>
                        <i class="icon-clock"></i> Senin - Sabtu : 11:00 - 20.00 WIB<br>
                        <i class="icon-clock"></i> Minggu : 10:00 - 17.00 WIB<br><br>
                        </div>
                        <div class="item-kontak">
                        <b>Kontak Kami</b><br>
                        <i class="icon-whatsapp-square"></i> 0822 58883050<br><br>
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