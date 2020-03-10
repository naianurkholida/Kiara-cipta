<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; padding-top: 0 !important">
    <div class="container" id="container-detail">
        <div class="row" style="margin-top: 70px;">
            <div class="col-md-4 col-sm-12">
                @foreach($data->getMedia($image) as $row)
                    <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px; background-color: #f9f9f9; background-image: url({{ $row->getUrl() }}); background-size: cover; background-position: center;"></div>
                @endforeach
            </div>
            <div class="col-md-8 col-sm-12">
                {!! $data->$related->$column !!}
            </div>
        </div>
    </div>
</div>