@extends('frontend.component.master')

@section('header')
<meta name="description" content="Kemitraan atau Reseller Derma Express.">

<link rel="canonical" href="http://derma-express.com/kemitraan">

<title>Reseller</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;padding-left: 300px;padding-right: 350px;">

    <div class="container" id="container_luar">
        <div class="container" id="container_dalem"><!-- 
            <iframe style="border:0px #ffffff none;" width="100%" height="800px;" src="http://103.11.134.45:1717/apex/f?p=889:2" scrolling="no" frameborder="1" allowfullscreen=""></iframe> -->
            <iframe style="border:0px #ffffff none;" width="100%" height="800px;" src="http://103.11.135.109:1717/apex/f?p=889:2" scrolling="no" frameborder="1" allowfullscreen=""></iframe>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Permohonan Reseller</h2>
                            <label>Nama <span style="color: red;">*</span></label>
                            <input type="text" name="name" class="form-control" required=""><br>

                            <label>Kota <span style="color: red;">*</span></label>
                            <select class="form-control" name="city" id="city"></select>
                        </div>
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
        $( "#container_luar" ).removeClass("container").addClass("container-fluid");
    } else {
        $( "#container_dalem" ).addClass("container");
        $( "#container_luar" ).removeClass("container-fluid").addClass("container");
    }

    $(document).ready(function() {
        jQuery.support.cors = true;
        $.ajax({
            url: 'http://103.11.134.45:8087/city',
            type: 'GET',
            dataType: 'Json',
        })
        .done(function(res) {
            console.log(res);
        });
    });
</script>
@endsection