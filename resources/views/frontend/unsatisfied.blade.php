@extends('frontend.component.master')
@section('header')
<meta name="description" content="Profil Derma Express - A Company by Dermaster Clinic.">
<link rel="canonical" href="https://derma-express.com/satisfied">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/satisfied" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Profile Derma di Sini." />

<title>Derma Express - A Company by Dermaster Clinic</title>
@endsection

@section('content')
<div class="breadcrumb-page"
    style="background-image: url({{ asset('assets/image/bg-paralax-title.jpg') }});">
    <div class="overlay-breadcrumb"></div>
    <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Unsatisfied Form</h2>
</div>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Unsatisfied</li>
        </ol>
    </nav>
    <br /><br />
</div>

<div class="container" style="margin-top: 0;padding-left: 80px;padding-right: 90px;">

    <div class="box-unsatisfied" style="margin-top:20px;padding: 20px;
    border: 1px solid #e1e1e1;
    border-radius: 8px;
    margin-bottom: 70px;">

        <div class="form-group">
            <label for="exampleFormControlFile1">Upload</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleFormControl">Reason</label>
            <textarea class="form-control mb-3" placeholder=""></textarea>
        </div>
        <button type="submit" class="btn btn-success mb-2">Submit</button>

    </div>

</div>
@endsection

@section('js')
<script>
    if (window.matchMedia('(max-width: 425px)')) {
        $("#container_dalem").removeClass("container");
        $("#container_luar").removeClass("container").addClass("container-fluid");
        $("#text-content").css("width", "100%");
        $("#img-content").css("width", "100%");
    } else {
        $("#container_dalem").addClass("container");
        $("#container_luar").removeClass("container-fluid").addClass("container");
    }

</script>
@endsection
