<div class="row">
	<div class="col-lg-2 grow">
		<img src="{{ asset('assets/image/logo/home.png') }}">
		<a href="{{ url('/dashboard-customer') }}">Beranda</a>
	</div>	
	<div class="col-lg-2 grow">
		<img src="{{ asset('assets/image/logo/user-2.png') }}">
		<a href="{{ url('/customer/profile') }}">Profile</a>
	</div>
	<div class="col-lg-2 grow">
		<img src="{{ asset('assets/image/logo/contract.png') }}">
		<a href="{{ url('/customer/history-transactions') }}">History Transactions</a>
	</div>
	<div class="col-lg-2 grow">
		<img src="{{ asset('assets/image/logo/password.png') }}">
		<a href="{{ url('/sign/forgot') }}">Change Password</a>
	</div>
	<div class="col-lg-2 grow">
		<img src="{{ asset('assets/image/logo/target.png') }}">
		<a href="{{ url('/customer/change-point') }}">Change Poin</a>
	</div>
	<div class="col-lg-2 grow">
		<img src="{{ asset('assets/image/logo/exit.png') }}">
		<a href="{{ url('/sign/logout') }}">Logout</a>
	</div>
</div>