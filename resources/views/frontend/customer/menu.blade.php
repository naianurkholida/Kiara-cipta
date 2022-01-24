<div class="flex-menu">
	
	@foreach(Helper::icon_menu() as $item)
	<a href="{{ url($item->url) }}">
		<div class="item-menu grow" style="width: 180px;">
			<img style="margin-right: 10px;" src="{{ asset('assets/admin/assets/media/img') }}/{{ $item->icon }}">
			{{ $item->name }}
		</div>
	</a>
	@endforeach

</div>