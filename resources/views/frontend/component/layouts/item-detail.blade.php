<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; padding-top: 0 !important">
    <div class="container" id="container_detail">
        <div class="row" style="margin-top: 70px;">
            <div class="col-md-4 col-sm-12">
                @foreach($data->getMedia($image) as $key => $row)
                    @if($key == 0)
                    <div class="img-home" style="margin-bottom:20px;width: 100%; height: 300px; background-color: #ffffff; background-image: url({{ $row->getUrl() }}); background-size: contain;background-repeat: no-repeat;   background-position: center;"></div>
                    @endif
                @endforeach
            </div>
            <div class="col-md-8 col-sm-12">
                {!! $data->$related->$column !!}
            </div>
        </div>
    </div>
</div>

