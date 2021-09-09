@extends('frontend.component.master')

@section('header')
<link rel="canonical" href="https://derma-express.com/">
<meta name="description" content="Derma Express, klinik kecantikan dengan dokter dan layanan estetika terbaik di Indonesia.">
<meta name="facebook-domain-verification" content="7gok7ljicai2ven06osijpt0ide58a" />
<title>Klinik Kecantikan dengan Dokter dan Layanan Estetika Terbaik di Indonesia.</title>

<style type="text/css">
.modal-dialog {
    width: 80% !important;
    height: 50% !important;
    margin: 0;
    padding: 0;
    max-width: 80% !important;
    padding: 0px !important;
    margin-top: 10% !important;
}

.modal-content {
    height: auto;
    min-height: 50% !important;
    border-radius: 0;
    margin-left: 15%;
    margin-right: 15%;
}

@media (max-width: 576px){
    .modal-show {
        padding: 0px !important;
    }

    .modal-content {
        height: auto;
        min-height: 50% !important;
        border-radius: 0;
        margin-left: 0% !important;
        margin-right: 0% !important;
    }

    .modal-dialog {
        margin-left: auto !important;
        margin-right: auto !important;
        margin-bottom: 50px !important;
        margin-top: 50px !important;
    }

    .img-set {
        height: auto !important;
    }

    .text-set {
        font-size: 12px !important;
    }
}
</style>
@endsection

@section('content')

@include('frontend.component.layouts.slider')

@include('frontend.component.layouts.welcome')

@include('frontend.component.layouts.treatment')

@include('frontend.component.layouts.bestseller')

@include('frontend.component.layouts.slider_product')

<!-- <div class="pop-container">
    <div class="box-pop">
        <div class="close-pop">X</div>
        <img src="{{ Helper::iklan() }}" style="border-radius: 20px;">
    </div>
</div> -->

<div class="modal" tabindex="-1" id="iklan">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 6px;">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('assets/admin/assets/media/posting/') }}/{{Helper::info_desc()->image}}" style="width: 100%; height: 380px;" class="img-set">
                    </div>

                    <div class="col-lg-6">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                        @endif
                        <h2 class="text-center" style="margin: 30px;">{{ Helper::info_desc()->judul }}</h2>
                        <div class="text-set" style="text-align: center; margin: 30px;"> {!! Helper::info_desc()->content !!} </div>

                        <form action="{{ url('share/update/iklan/diskon/post') }}" method="POST">
                            {{csrf_field()}}
                            <div class="input-group mb-3" style="margin-top: 20px; height: 50px;">
                                <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" style="height: 50px; margin-left: 30px;" required="" id="email" value="">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit" style="margin-right: 30px;">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function(){ 
            $('#iklan').modal('show')
        }, 3000);
    });
</script>
@endsection