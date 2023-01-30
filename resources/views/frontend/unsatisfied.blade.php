@extends('frontend.component.master')
@section('header')
<meta name="description" content="Profil Derma Express - A Company by Dermaster Clinic.">
<link rel="canonical" href="https://derma-express.com/satisfied">
<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article" />
<meta property="og:url" content="https://derma-express.com/satisfied" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Profile Derma di Sini." />
<meta name="csrf-token" content="{{ csrf_token() }}">

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
            <li class="breadcrumb-item" style="font-size: 8px !important;"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active" style="font-size: 8px !important;" aria-current="page">Unsatisfied</li>
        </ol>
    </nav>
    <br /><br />
</div>

<div class="container" style="margin-top: 0;padding-left: 80px;padding-right: 90px;">

    <div class="box-unsatisfied" style="margin-top:20px;padding: 20px;
    border: 1px solid #e1e1e1;
    border-radius: 8px;
    margin-bottom: 70px;">
        @if($msg)
        <div class="alert alert-success alert-dismissible">{{ $msg }}</div>
        @endif

        @if($msg_error)
        <div class="alert alert-danger alert-dismissible">{{ $msg_error }}</div>
        @endif
        <form action="{{ url('unsatisfied',$trx_no) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleFormControlFile1">Upload</label>
                <input type="hidden" name="code" class="form-control" value="{{ $trx_no }}">
                <input type="file" name="image" class="form-control-file" id="file">
                <input type="hidden" name="filename" id="filename">
            </div>
            <div class="form-group">
                <label for="exampleFormControl">Reason</label>
                <textarea class="form-control mb-3" name="reason" placeholder="" minlength="10"></textarea>
            </div>
            <button type="submit" class="btn btn-success mb-2">Submit</button>
        </form>

    </div>

</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/compressorjs/1.1.1/compressor.min.js" integrity="sha512-VaRptAfSxXFAv+vx33XixtIVT9A/9unb1Q8fp63y1ljF+Sbka+eMJWoDAArdm7jOYuLQHVx5v60TQ+t3EA8weA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });


    document.getElementById('file').addEventListener('change', (e) => {
        const file = e.target.files[0];

        if (!file) {
            return;
        }

        new Compressor(file, {
            quality: 2,
            width: 500,
            height: 500,

            // The compression process is asynchronous,
            // which means you have to access the `result` in the `success` hook function.
            success(result) {
                const formData = new FormData();

                // The third parameter is required for server
                formData.append('image', result);
                formData.append('name', result.name);

                //Send the compressed image file to server with XMLHttpRequest.
                $.ajax({
                    url: "{{ url('unsatisfied/store/image') }}",
                    method: 'POST',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData,
                    enctype: 'multipart/form-data',
                    success: function(data) {
                        $('#filename').val(data)
                        console.log(data)
                    }
                });

            },
            error(err) {
                console.log(err.message);
            },
        });
    
    });
</script>
@endsection
