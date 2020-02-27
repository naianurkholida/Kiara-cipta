<!-- youtube Feeds -->
<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>Youtube Channel</h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row align-items-center">
        @foreach(Helper::youtube() as $row)
            <div class="col-md-6 col-sm-12" style="margin-bottom: 20px;">
                <iframe width="100%" height="312" src="{{ $row->link }}" frameborder="0" allowfullscreen></iframe>
            </div>
        @endforeach
    </div>
</div>