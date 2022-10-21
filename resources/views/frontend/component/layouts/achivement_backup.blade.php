<div class="section topmargin nobottommargin nobottomborder" style="margin: 0 !important; background-color: #ffffff !important; ">
	<div class="container clearfix">
		<center>
			<h2>
				Award
			</h2>
		</center>
	</div>
</div>

<div class="container clearfix">
    <center>
         <div style="display: flex; width: 100%;">
<!--             <div style="width: 50%;">
                <img src="{{ asset('assets/image/award.jpg') }}" class="img-award">
            </div>
            <div style="width: 50%;">
                <img src="{{ asset('assets/image/award-3.jpg') }}" class="img-award">
            </div>
        </div> -->

        @foreach(Helper::awardsHome() as $item)
        <div style="width: 50%;">
            <img src="{{ asset('assets/admin/assets/media/pages') }}/{{ $item->image }}" alt="{{ $item->judul_page }}" style="padding: 5px; border-radius: 5%;" class="lazyload img-award">
        </div>
        @endforeach
    </div>
    </center>
</div>
