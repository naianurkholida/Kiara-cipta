<div class="flex-menu">
	
		<div class="item-menu grow">
			<img style="margin-right: 10px;" src="{{ asset('assets/admin/assets/media/img') }}/{{ Helper::icon_menu()['icon_menu_1'] }}">
			<a href="{{ url('/dashboard-customer') }}">Beranda</a>
		</div>	
	
		<div class="item-menu grow">
			<img style="margin-right: 10px;" src="{{ asset('assets/admin/assets/media/img') }}/{{ Helper::icon_menu()['icon_menu_2'] }}">
			<a href="{{ url('/customer/profile') }}">Profile</a>
		</div>
	
		<div class="item-menu grow">
			<img style="margin-right: 10px;" src="{{ asset('assets/admin/assets/media/img') }}/{{ Helper::icon_menu()['icon_menu_3'] }}">
			<a href="{{ url('/customer/history-transactions') }}">Transactions</a>
		</div>
	
		<div class="item-menu grow">
			<img style="margin-right: 10px;" src="{{ asset('assets/admin/assets/media/img') }}/{{ Helper::icon_menu()['icon_menu_4'] }}">
			<a href="{{ url('/sign/forgot') }}">Change Password</a>
		</div>
	
		<div class="item-menu grow">
			<img style="margin-right: 10px;" src="{{ asset('assets/admin/assets/media/img') }}/{{ Helper::icon_menu()['icon_menu_5'] }}">
			<a href="{{ url('/customer/change-point') }}">Change Poin</a>
		</div>
	
		<div class="item-menu grow">
			<img style="margin-right: 10px;" src="{{ asset('assets/admin/assets/media/img') }}/{{ Helper::icon_menu()['icon_menu_6'] }}">
			<a href="{{ url('/sign/logout') }}">Logout</a>
		</div>
</div>