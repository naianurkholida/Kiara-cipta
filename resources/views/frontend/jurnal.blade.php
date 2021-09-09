@extends('frontend.component.master')
@section('header')

<meta name="description" content="List Jurnal Derma Express.">
<link rel="canonical" href="https://derma-express.com/jurnal">

<meta property="og:locale" content="id_ID" />
<meta property="og:type" content="article"/>
<meta property="og:url" content="https://derma-express.com/jurnal" />
<meta property="og:title" content="Derma Express" />
<meta property="og:description" content="Yuk Check Kegiatan dan Info Terbaru Derma di Sini." />

<title>Jurnal</title>
@endsection

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container">
        @foreach($data as $row)
        <div class="box-jurnal">
            <img class="img-jurnal" src="{{ asset('assets/admin/assets/media/posting/') }}/{{$row->image}}" alt="{{ asset('assets/admin/assets/media/posting/') }}/{{$row->image}}">
            <a href="{{ route('dermaster.jurnal.show', $row->getPostingLanguage->seo) }}">
               <p id="dokter-name">{{ $row->getPostingLanguage->judul }}</p>
           </a>
           <p style="margin-bottom:10 !important;">{!! Helper::removeTags($row->getPostingLanguage->content) !!}</p>
           <a class="readmore-jurnal" href="{{ route('dermaster.jurnal.show', $row->getPostingLanguage->seo) }}">
               Read More
           </a>
       </div>
       @endforeach
   </div>

</div>
@endsection