@extends('frontend.component.master')

@section('content')
<div class="section nobg nobottommargin clearfix" style="margin-top: 0;">
    <div class="container">
        <div class="container">
            <div class="row">
                @foreach($data as $row)
                    <div class="col-md-3" style="text-align: center;margin-bottom: 20px;">
                        <div class="box-dokter" style="min-height: 441px;">
                            <div class="img-dokter" style="background-image: url({{ $row->getFirstMediaUrl('posting') }});"></div>
                            <a href="{{ route('dermaster.jurnal.show', $row->getPostingLanguage->seo) }}">
                            	<p id="dokter-name">{{ $row->getPostingLanguage->judul }}</p>
                            </a>
                            <p style="margin-bottom:10 !important;">{!! Helper::removeTags($row->getPostingLanguage->content) !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection