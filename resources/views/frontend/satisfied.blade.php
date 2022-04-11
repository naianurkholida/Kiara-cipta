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
    <h2 class="" style="margin:0;font-weight:600;z-index: 9;">Satisfied</h2>
</div>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Satisfied</li>
        </ol>
    </nav>
    <br /><br />
</div>

<div class="container" style="margin-top: 0;padding-left: 80px;padding-right: 90px;">
    <div>
        <h3>
            Thank you for providing feedback. <br> 
            We appreciated the time you have token and will actively use it to improve our services to you.
        </h3>
    </div>
    <div style="margin-top: 20px;">
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia quod in aspernatur magni. Ipsum ratione beatae voluptatem natus impedit, dolorem unde quae dicta enim inventore ad aperiam placeat rerum labore. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis sit, voluptates nostrum mollitia architecto atque adipisci eum ut quos, inventore dolore. Vero blanditiis debitis neque ad omnis autem ut officia?</p>
    </div>
    <div style="margin-top: 20px;">
        <p>Love, <br> Derma Express</p>
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
