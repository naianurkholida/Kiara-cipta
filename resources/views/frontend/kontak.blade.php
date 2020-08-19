@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">

    <div class="container" id="container_luar">
        <div class="container" id="container_dalem">
        @include('component.alert.global')
            <div class="row">
                <div class="col-lg-12">
                   <h3>Hubungi Kami</h3>
                    <form method="POST" action="{{ route('inbox.post') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Masukan alamat email anda" name="email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="inbox"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!! $content->konten_page !!}
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