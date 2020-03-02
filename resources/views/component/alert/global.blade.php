@foreach(['danger', 'warning', 'success', 'info'] as $key)
    @if(session::get($key))
    	<div class="alert alert-{{ $key }} alert-dismissible fade show" role="alert" id="global-alert">
    		<strong>{{ session::get($key) }}</strong>
    		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
    		</button>
    	</div>
    @endif

@endforeach