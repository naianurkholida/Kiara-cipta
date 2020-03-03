<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
#front page route
	use App\Entities\Admin\core\MenuFrontPage;
	$url = MenuFrontPage::all();

	Route::get('/', function() {
		return redirect()->route('dermaster.home');
	});

	#get kategori ajax midtrans zakat
	Route::get('/get_data_kategori/{id}', 'FrontPage\FrontPageController@get_kategori')->name('kategorigetdata');

	#login and register
	Route::get('/masuk', 'FrontPage\FrontPageController@login')->name('front_page.login');
	Route::post('/proses-masuk', 'FrontPage\FrontPageController@pro_login')->name('front_page.pro_login');
	Route::get('/daftar', 'FrontPage\FrontPageController@register')->name('front_page.register');
	Route::post('/proses-daftar', 'FrontPage\FrontPageController@pro_register')->name('front_page.pro_register');
	Route::get('/daftar/cek_email/{email}', 'FrontPage\FrontPageController@cek_email')->name('front_page.cek_email');
	Route::get('/daftar/email-verify'."/".'{tok}', 'FrontPage\FrontPageController@email_verify')->name('front_page.email_verify');
	Route::get('/dashboard-donatur/cek_password/{password}', 'FrontPage\FrontPageController@cek_password')->name('front_page.cek_password');

	Route::get('/forgot-password', 'FrontPage\FrontPageController@forgot_password')->name('front_page.forgot_password');
	Route::post('/forgot-password-post', 'FrontPage\FrontPageController@forgot_password_post')->name('front_page.forgot_password_post');
	Route::get('/forgot-password/{token}', 'FrontPage\FrontPageController@verify_forgot_password')->name('front_page.verify_forgot_password');
	Route::post('/post-ganti-password/{id}', 'FrontPage\FrontPageController@post_ganti_password')->name('front_page.post_reset_password');

	#front page
	Route::get('/home', 'FrontPage\FrontPageController@index')->name('front_page.index');
	Route::get('/dashboard-donatur', 'FrontPage\FrontPageController@dashboard_donatur')->name('front_page.dash_donatur');
	Route::get('/dashboard-donatur/post_ganti_password/{id}', 'FrontPage\FrontPageController@post_ganti_password')->name('front_end.post_reset_password');
	Route::post('/dashboard-donatur/post_ganti_profile/{id}', 'FrontPage\FrontPageController@post_ganti_profile')->name('front_end.post_edit_profile');
	Route::get('/dashboard-donatur/post_ganti_profile/{id}', 'FrontPage\FrontPageController@post_ganti_profile')->name('front_end.post_edit_profile');

	foreach($url as $url){
		Route::get('/'.$url->url, 'FrontPage\FrontPageController@routing')->name('front_page.'.$url->url);
	}
	Route::get('/logout', 'FrontPage\FrontPageController@logout')->name('front_page.logout');

	#change lang
	Route::post('/switch-language', 'FrontPage\FrontPageController@switch_language')->name('front_page.switch_language');

	#program dan donasi
	Route::get('donateform/{id}', 'FrontPage\FrontPageController@donasi_program')->name('program.donasi');
	Route::get('detailprogram/{id}', 'FrontPage\FrontPageController@detailprogram')->name('program.detailprogram');
	Route::get('/snaptoken', 'FrontPage\DonasiController@token')->name('donasi.snaptoken');
	Route::post('/snapfinish', 'FrontPage\DonasiController@finish')->name('donasi.snapfinish');
	Route::get('/get-invoice/{id}', 'FrontPage\DonasiController@get_invoice')->name('donasi.get_invoice');

	#update
	Route::get('update/{id}', 'FrontPage\FrontPageController@update_detail')->name('update.detail');

	#search
	Route::get('/programs/pencarian', 'FrontPage\FrontPageController@cari')->name('program.cari');

	#zakat front page
	Route::group(['prefix' => 'zakat'], function(){
		#front page
		Route::get('/form-zakat', 'FrontPage\FrontPageController@form_zakat')->name('zakat.form');
		Route::get('/kalkulator', 'FrontPage\FrontPageController@kalkulator')->name('zakat.kalkulator');
		Route::get('/snaptokens', 'FrontPage\ZakatController@token')->name('zakat.snaptokens');
		Route::post('/snapfinishs', 'FrontPage\ZakatController@finish')->name('zakat.snapfinishs');
		Route::post('/zakat-post-penghasilan', 'FrontPage\FrontPageController@zakat_penghasilan_store')->name('zakat.insert_penghasilan');
		Route::post('/zakat-post-harta', 'FrontPage\FrontPageController@zakat_harta_store')->name('zakat.insert_harta');
		Route::post('/zakat-post-perniagaan', 'FrontPage\FrontPageController@zakat_perniagaan_store')->name('zakat.insert_perniagaan');
		Route::post('/zakat-post-fitrah', 'FrontPage\FrontPageController@zakat_fitrah_store')->name('zakat.insert_fitrah');
	});

	#kisah sukses
	Route::get('/kisah-sukses/{id}', 'FrontPage\FrontPageController@kisah_sukses')->name('home.kisah');

	#notif midtrans
	Route::group(['prefix' => 'notif'], function(){
		Route::get('/notif-success', 'FrontPage\DonasiController@setSuccess')->name('notif.success');
		Route::get('/notif-pending', 'FrontPage\DonasiController@setPending')->name('notif.pending');
		Route::get('/notif-error', 'FrontPage\DonasiController@setError')->name('notif.error');
		Route::get('/notif-konfirmasi', 'FrontPage\DonasiController@setKonfirmasi')->name('notif.konfirmasi');
		Route::get('/notifikasi-konfirmasi', 'FrontPage\DonasiController@setKonfirmasi2')->name('notif.konfirmasi2');
	});

	#redirect

	Route::get('/notif-register', 'FrontPage\FrontPageController@notif_register')->name('notif.register');

	#footer
	Route::get('/syarat&ketentuan', 'FrontPage\FrontPageController@syarat_dan_ketentuan');
	Route::get('/ketentuan&privasi', 'FrontPage\FrontPageController@ketentuan_privacy');
	Route::get('/kontak', 'FrontPage\FrontPageController@kontak');
	Route::get('/kantor-cabang', 'FrontPage\FrontPageController@kantor_cabang');
	Route::get('/kebijakan-refund', 'FrontPage\FrontPageController@kebijakan_refund');
	Route::get('/rekening-donasi', 'FrontPage\FrontPageController@rekening_donasi');


	#detail transfer
	Route::get('/konfirmasi-pembayaran/{id}', 'FrontPage\DonasiController@konfirmasi_pembayaran')->name('konfirmasi.pembayaran');
	Route::post('/approve-pay', 'FrontPage\DonasiController@konfirmasi_pay')->name('konfirmasi.pay');
#end frontpage route

#new front page route

Route::group(['prefix' => '/derma-express'], function(){
	Route::get('/', 'FrontPage\HomeController')->name('dermaster.home');
	
	Route::group(['prefix' => 'dokter'], function(){
		Route::get('/', 'FrontPage\DokterController@index')->name('dermaster.dokter');
		Route::get('/show/{id}', 'FrontPage\DokterController@show')->name('dermaster.dokter.show');
	});

	Route::group(['prefix' => 'profile'], function(){
		Route::get('/', 'FrontPage\ProfileController@index')->name('dermaster.tentang_kami');
	});

	Route::group(['prefix' => 'products'], function(){
		Route::get('/', 'FrontPage\ProductsController@index')->name('dermaster.products');
		Route::get('/show/{id}', 'FrontPage\ProductsController@show')->name('dermaster.products.show');
	});

	Route::group(['prefix' => 'treatments'], function(){
		Route::get('/{id}', 'FrontPage\TreatmentsController@index')->name('dermaster.treatments');
		Route::get('/show/{id}', 'FrontPage\TreatmentsController@show')->name('dermaster.treatments.show');
	});

	Route::group(['prefix' => 'sosial'], function(){
		Route::get('/', 'FrontPage\SosialController@index')->name('dermaster.sosial');
		Route::get('/show/{id}', 'FrontPage\SosialController@show')->name('dermaster.sosial.show');
	});

	Route::group(['prefix' => 'blog'], function(){
		Route::get('/', 'FrontPage\BlogController@index')->name('dermaster.blog');
		Route::get('/show/{id}', 'FrontPage\BlogController@show')->name('dermaster.blog.show');
	});

	Route::get('/gallery', 'FrontPage\GalleryController@index')->name('dermaster.gallery');

	Route::get('/checkpoint', 'FrontPage\CheckPointController@index')->name('dermaster.checkpoint');

	Route::get('/kontak', 'FrontPage\KontakController@index')->name('dermaster.kontak');
});

#end new front page route

#language route

Route::group(['prefix' => 'language'], function(){
	Route::get('/switch/{id}', 'Language\SwitchLanguageController')->name('language.switch');
});

#end language route

#backend route
	#login 
	Route::group(['prefix' => 'login'], function(){
		Route::get('/', 'Admin\core\LoginController@form_login')->name('login.form_login');
		Route::post('/login', 'Admin\core\LoginController@proses_login')->name('login.proses_login');
		Route::get('/logout', 'Admin\core\LoginController@logout')->name('login.logout');

	});
	
	#error 404 Not Founds
	Route::get('/error404', 'Admin\core\LoginController@error404')->name('error404');

	#dashboard
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'dashboard'
	], function(){    
		Route::get('/', 'Admin\core\DashboardController')->name('dashboard.index');
	});

	#menu management (core)
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'menu',
	], function(){    
		Route::get('/', 'Admin\core\MenuController@index')->name('menu.index');
		Route::get('/insert', 'Admin\core\MenuController@insert')->name('menu.insert');
		Route::post('/store', 'Admin\core\MenuController@store')->name('menu.store');
		Route::get('/edit/{id}', 'Admin\core\MenuController@edit')->name('menu.edit');
		Route::post('/update/{id}', 'Admin\core\MenuController@update')->name('menu.update');
		Route::get('/delete/{id}', 'Admin\core\MenuController@delete')->name('menu.delete');
	});

	#user management (core)
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'user',
	], function(){    
		Route::get('/', 'Admin\core\UserController@index')->name('user.index');
		Route::get('/insert', 'Admin\core\UserController@insert')->name('user.insert');
		Route::post('/store', 'Admin\core\UserController@store')->name('user.store');
		Route::get('/edit/{id}', 'Admin\core\UserController@edit')->name('user.edit');
		Route::post('/update/{id}', 'Admin\core\UserController@update')->name('user.update');
		Route::get('/delete/{id}', 'Admin\core\UserController@delete')->name('user.delete');
	});

	#role management (core)
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'role',
	], function(){    
		Route::get('/', 'Admin\core\RoleController@index')->name('role.index');
		Route::get('/insert', 'Admin\core\RoleController@insert')->name('role.insert');
		Route::post('/store', 'Admin\core\RoleController@store')->name('role.store');
		Route::get('/edit/{id}', 'Admin\core\RoleController@edit')->name('role.edit');
		Route::post('/update/{id}', 'Admin\core\RoleController@update')->name('role.update');
		Route::get('/delete/{id}', 'Admin\core\RoleController@delete')->name('role.delete');
	});

	#menu akses management (core)
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'menuaccess',
	], function(){
		Route::get('/', 'Admin\core\MenuAccessController@index')->name('menuaccess.index');
		Route::post('/cari', 'Admin\core\MenuAccessController@cari')->name('menuaccess.cari');
		Route::post('/store', 'Admin\core\MenuAccessController@store')->name('menuaccess.store');
		Route::get('/list_akses/{role_id}', 'Admin\core\MenuAccessController@list_akses')->name('menuaccess.list_akses');
	});

	#produk admin
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'produk'
	], function(){
		Route::get('/', 'Admin\core\ProdukController@index')->name('produk.index');
		Route::get('/insert', 'Admin\core\ProdukController@insert')->name('produk.insert');
		Route::post('/store', 'Admin\core\ProdukController@store')->name('produk.store');
		Route::get('/edit/{id}', 'Admin\core\ProdukController@edit')->name('produk.edit');
		Route::post('/update/{id}', 'Admin\core\ProdukController@update')->name('produk.update');
		Route::get('/delete/{id}', 'Admin\core\ProdukController@delete')->name('produk.delete');
		Route::get('/history/{id}', 'Admin\core\ProdukController@history')->name('produk.history');
	});

	#sosmed admin
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'sosmed'
	], function(){
		Route::get('/', 'Admin\core\SosmedController@index')->name('sosmed.index');
		Route::get('/insert', 'Admin\core\SosmedController@insert')->name('sosmed.insert');
		Route::post('/store', 'Admin\core\SosmedController@store')->name('sosmed.store');
		Route::get('/edit/{id}', 'Admin\core\SosmedController@edit')->name('sosmed.edit');
		Route::post('/update/{id}', 'Admin\core\SosmedController@update')->name('sosmed.update');
		Route::get('/delete/{id}', 'Admin\core\SosmedController@delete')->name('sosmed.delete');
		Route::get('/history/{id}', 'Admin\core\SosmedController@history')->name('sosmed.history');
	});

	#treatment admin
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'treatment'
	], function(){
		Route::get('/', 'Admin\core\TreatmentController@index')->name('treatment.index');
		Route::get('/insert', 'Admin\core\TreatmentController@insert')->name('treatment.insert');
		Route::post('/store', 'Admin\core\TreatmentController@store')->name('treatment.store');
		Route::get('/edit/{id}', 'Admin\core\TreatmentController@edit')->name('treatment.edit');
		Route::post('/update/{id}', 'Admin\core\TreatmentController@update')->name('treatment.update');
		Route::get('/delete/{id}', 'Admin\core\TreatmentController@delete')->name('treatment.delete');
		Route::get('/history/{id}', 'Admin\core\TreatmentController@history')->name('treatment.history');
	});

	#gallery admin
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'gallery'
	], function(){
		Route::get('/', 'Admin\core\GalleryController@index')->name('gallery.index');
		Route::get('/insert', 'Admin\core\GalleryController@insert')->name('gallery.insert');
		Route::post('/store', 'Admin\core\GalleryController@store')->name('gallery.store');
		Route::get('/edit/{id}', 'Admin\core\GalleryController@edit')->name('gallery.edit');
		Route::post('/update/{id}', 'Admin\core\GalleryController@update')->name('gallery.update');
		Route::get('/delete/{id}', 'Admin\core\GalleryController@delete')->name('gallery.delete');
		Route::get('/history/{id}', 'Admin\core\GalleryController@history')->name('gallery.history');
	});

	#dokter admin
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'dokter'
	], function(){
		Route::get('/', 'Admin\core\DokterController@index')->name('dokter.index');
		Route::get('/insert', 'Admin\core\DokterController@insert')->name('dokter.insert');
		Route::post('/store', 'Admin\core\DokterController@store')->name('dokter.store');
		Route::get('/edit/{id}', 'Admin\core\DokterController@edit')->name('dokter.edit');
		Route::post('/update/{id}', 'Admin\core\DokterController@update')->name('dokter.update');
		Route::get('/delete/{id}', 'Admin\core\DokterController@delete')->name('dokter.delete');
		Route::get('/history/{id}', 'Admin\core\DokterController@history')->name('dokter.history');
	});

	#store Media
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'storeMedia'
	], function(){
		Route::post('/', 'Admin\core\MediaController')->name('media.store');
	});

	#category
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'category'
	], function(){
		Route::get('/', 'Admin\core\CategoryController@index')->name('category.index');
		Route::get('/insert', 'Admin\core\CategoryController@create')->name('category.insert');
		Route::post('/insert/post', 'Admin\core\CategoryController@store')->name('category.post');
		Route::get('/edit/{id_category}', 'Admin\core\CategoryController@edit')->name('category.edit');
		Route::post('/insert/update/{id_category}', 'Admin\core\CategoryController@update')->name('category.update');
		Route::get('/detail/{id_category}', 'Admin\core\CategoryController@show')->name('category.detail');
		Route::get('/delete/{id_category}', 'Admin\core\CategoryController@delete')->name('category.delete');
	});

	#posting
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'posting'
	], function(){
		Route::get('/', 'Admin\core\PostingController@index')->name('posting.index');
		Route::get('/insert', 'Admin\core\PostingController@create')->name('posting.insert');
		Route::post('/insert/post', 'Admin\core\PostingController@store')->name('posting.post');
		Route::get('/edit/{id_posting}', 'Admin\core\PostingController@edit')->name('posting.edit');
		Route::post('/insert/update/{id_posting}', 'Admin\core\PostingController@update')->name('posting.update');
		Route::get('/detail/{id_posting}', 'Admin\core\PostingController@show')->name('posting.detail');
		Route::get('/delete/{id_posting}', 'Admin\core\PostingController@destroy')->name('posting.delete');
	});

	#pages
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'pages'
	], function(){
		Route::get('/', 'Admin\core\PagesController@index')->name('pages.index');
		Route::get('/insert', 'Admin\core\PagesController@create')->name('pages.insert');
		Route::post('/insert/post', 'Admin\core\PagesController@store')->name('pages.post');
		Route::get('/edit/{id_pages}', 'Admin\core\PagesController@edit')->name('pages.edit');
		Route::post('/edit/update/{id_pages}', 'Admin\core\PagesController@update')->name('pages.update');
		Route::get('/detail/{id_pages}', 'Admin\core\PagesController@show')->name('pages.detail');
		Route::get('/delete/{id_pages}', 'Admin\core\PagesController@destroy')->name('pages.delete');
	});


	#menu front page
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'menu_front_page'
	], function(){
		Route::get('/', 'Admin\core\MenuFrontPageController@index')->name('menu_front_page.index');
		Route::get('/insert', 'Admin\core\MenuFrontPageController@create')->name('menu_front_page.insert');
		Route::post('/insert/post', 'Admin\core\MenuFrontPageController@store')->name('menu_front_page.post');
		Route::get('/edit/{id_menu_front_page}', 'Admin\core\MenuFrontPageController@edit')->name('menu_front_page.edit');
		Route::post('/edit/update/{id_menu_front_page}', 'Admin\core\MenuFrontPageController@update')->name('menu_front_page.update');
		Route::post('/edit/update_back/{id_menu_front_page}', 'Admin\core\MenuFrontPageController@update_back')->name('menu_front_page.update_back');
		Route::get('/detail/{id_menu_front_page}', 'Admin\core\MenuFrontPageController@show')->name('menu_front_page.detail');
		Route::get('/delete/{id_menu_front_page}', 'Admin\core\MenuFrontPageController@destroy')->name('menu_front_page.delete');
	});


	#parameter
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'parameter'
	], function(){
		Route::get('/', 'Admin\core\ParameterController@index')->name('parameter.index');
		Route::get('/insert', 'Admin\core\ParameterController@create')->name('parameter.insert');
		Route::post('/insert/post', 'Admin\core\ParameterController@store')->name('parameter.post');
		Route::get('/edit/{id_parameter}', 'Admin\core\ParameterController@edit')->name('parameter.edit');
		Route::post('/edit/update/{id_parameter}', 'Admin\core\ParameterController@update')->name('parameter.update');
		Route::post('/edit/update_detail/{id_parameter}', 'Admin\core\ParameterController@update_detail')->name('parameter.update_detail');
		Route::get('/detail/{id_parameter}', 'Admin\core\ParameterController@show')->name('parameter.detail');
		Route::get('/delete/{id_parameter}', 'Admin\core\ParameterController@destroy')->name('parameter.delete');
	});

	#language
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'language'
	], function(){
		Route::get('/', 'Admin\core\LanguageController@index')->name('language.index');
		Route::get('/insert', 'Admin\core\LanguageController@create')->name('language.insert');
		Route::post('/insert/post', 'Admin\core\LanguageController@store')->name('language.post');
		Route::get('/edit/{id}', 'Admin\core\LanguageController@edit')->name('language.edit');
		Route::post('/insert/update/{id}', 'Admin\core\LanguageController@update')->name('language.update');
		Route::get('/detail/{id}', 'Admin\core\LanguageController@show')->name('language.detail');
		Route::get('/delete/{id}', 'Admin\core\LanguageController@destroy')->name('language.delete');
	});

	#theme
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'theme'
	], function(){
		Route::get('/', 'Admin\core\ThemeController@index')->name('theme.index');
		Route::get('/actived/{id_theme}', 'Admin\core\ThemeController@actived')->name('theme.actived');
	});

	#inbox
	Route::group([
		'prefix' => 'inbox'
	], function(){
		Route::get('/', 'Admin\core\InboxAndCommentsController@index')->name('inbox.index');
		Route::get('/actived/{id_comments}', 'Admin\core\InboxAndCommentsController@actived')->name('comments.actived');
		Route::post('/inbox/post', 'Admin\core\InboxAndCommentsController@post_inbox')->name('inbox.post');
		Route::post('/comment/post', 'Admin\core\InboxAndCommentsController@post_comment')->name('comment.post');
	});

	#modul profile
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'modul_profile'
	], function(){
		Route::get('/', 'Admin\core\ModulProfileController@index')->name('modul_profile.index');
		Route::post('/post', 'Admin\core\ModulProfileController@post')->name('modul_profile.post');

		//delete
		Route::get('/delete_misi/{id}', 'Admin\core\ModulProfileController@delete_misi')->name('modul_profile.delete_misi');
		Route::get('/delete_legalitas/{id}', 'Admin\core\ModulProfileController@delete_legalitas')->name('modul_profile.delete_legalitas');
		Route::get('/delete_dewan_pembina/{id}', 'Admin\core\ModulProfileController@delete_dewan_pembina')->name('modul_profile.delete_dewan_pembina');
		Route::get('/delete_pengawas_syariah/{id}', 'Admin\core\ModulProfileController@delete_pengawas_syariah')->name('modul_profile.delete_pengawas_syariah');
		Route::get('/delete_pengawas/{id}', 'Admin\core\ModulProfileController@delete_pengawas')->name('modul_profile.delete_pengawas');
		Route::get('/delete_direksi/{id}', 'Admin\core\ModulProfileController@delete_direksi')->name('modul_profile.delete_direksi');
		Route::get('/delete_sejarah/{id}', 'Admin\core\ModulProfileController@delete_sejarah')->name('modul_profile.delete_sejarah');
		Route::get('/delete_kepengurusan/{id}', 'Admin\core\ModulProfileController@delete_kepengurusan')->name('modul_profile.delete_kepengurusan');
	});

	#setup
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'setup'
	], function(){
		Route::get('/settings', 'Admin\core\SetupController@settings')->name('setup.settings');
		Route::post('/store_settings', 'Admin\core\SetupController@store_settings')->name('setup.store_settings');
	});

	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'zakats'
	], function(){
		Route::get('/', 'Admin\core\ZakatsController@index')->name('zakats.index');
	});

	#slider
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'slider'
	], function(){
		Route::get('/', 'Admin\core\SliderController@index')->name('slider.index');
		Route::get('/insert', 'Admin\core\SliderController@create')->name('slider.insert');
		Route::post('/store', 'Admin\core\SliderController@store')->name('slider.post');
		Route::get('/edit/{id}', 'Admin\core\SliderController@edit')->name('slider.edit');
		Route::post('/update/{id}', 'Admin\core\SliderController@update')->name('slider.update');
		Route::get('/delete/{id}', 'Admin\core\SliderController@delete')->name('slider.delete');
	});
#end route backend