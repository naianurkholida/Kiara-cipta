@extends('frontend.component.master')

@section('header')
<meta name="description" content="Kemitraan atau Reseller Derma Express.">

<link rel="canonical" href="http://derma-express.com/kemitraan">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<title>Reseller</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;padding-left: 300px;padding-right: 350px;">

    <div class="container" id="container_luar">
        <div class="container" id="container_dalem"><!-- 
            <iframe style="border:0px #ffffff none;" width="100%" height="800px;" src="http://103.11.134.45:1717/apex/f?p=889:2" scrolling="no" frameborder="1" allowfullscreen=""></iframe> -->
            <!-- <iframe style="border:0px #ffffff none;" width="100%" height="800px;" src="http://103.11.135.109:1717/apex/f?p=889:2" scrolling="no" frameborder="1" allowfullscreen=""></iframe> -->

            <div class="card" style="border-radius: 10px;">
                <div class="card-body">
                    <h2>Permohonan Reseller</h2>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <form action="{{ Route('dermaster.kemitraan.store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <label>Nama <span style="color: red;">*</span></label>
                                <input type="text" name="name" class="form-control" required="" placeholder="Nama"><br>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <label>Kota <span style="color: red;">*</span></label>
                                <select class="js-example-basic-multiple form-control" name="city" id="city" style="width: 100%;">
                                    <?php foreach (Helper::getCity() as $key => $value) { ?>
                                        <option value="{{ $value[0] }}">{{ $value[1] }}</option>
                                    <?php } ?>
                                </select><br>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <label>Email <span style="color: red;">*</span></label>
                                <input type="text" name="email" class="form-control" required="" placeholder="Email"><br>
                            </div>
                            <br>
                            <div class="col-lg-12"><br>
                                <label>No HP / Whatsapp</label>
                                <input type="text" name="no_hp" class="form-control" required="" placeholder="No Hp atau Whatsapp"><br>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-info" style="width: 100%;">Kirim</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>

    if (window.matchMedia('(max-width: 425px)'))
    {
        $( "#container_dalem" ).removeClass("container");
        $( "#container_luar" ).removeClass("container").addClass("container-fluid");
    } else {
        $( "#container_dalem" ).addClass("container");
        $( "#container_luar" ).removeClass("container-fluid").addClass("container");
    }

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: " Kota"
        });
    });

    function kirimKemitraan() {
        alert('Masih dalam Maintenance');
    }
</script>
@endsection