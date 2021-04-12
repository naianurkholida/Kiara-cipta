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
Route::get('/phpinfo', 'Admin\core\TreatmentController@phpinfo');

#new front page route

	Route::get('/', 'FrontPage\HomeController')->name('dermaster.home');
	Route::get('/ajax-produk', 'FrontPage\HomeController@produkListJson');
	Route::get('/ajax-kategori-produk', 'FrontPage\HomeController@kategoriProdukListJson');
	Route::get('/ajax-treatment', 'FrontPage\HomeController@treatmentListJson');
	Route::get('/ajax-jurnal', 'FrontPage\HomeController@jurnalListJson');
	Route::get('/ajax-sub-menu', 'FrontPage\HomeController@getSubMenuById');

	Route::group(['prefix' => 'jurnal'], function(){
		Route::get('/', 'FrontPage\JurnalController@index')->name('dermaster.jurnal');
		Route::get('/blog', 'FrontPage\JurnalController@blog')->name('dermaster.jurnal.blog');
		Route::get('/media', 'FrontPage\JurnalController@blog')->name('dermaster.jurnal.media');
		Route::get('/show/{id}', 'FrontPage\JurnalController@show')->name('dermaster.jurnal.show');
	});

	Route::group(['prefix' => 'dokter'], function(){
		Route::get('/', 'FrontPage\DokterController@index')->name('dermaster.dokter');
		Route::get('/show/{id}', 'FrontPage\DokterController@show')->name('dermaster.dokter.show');
	});

	Route::group(['prefix' => 'profile'], function(){
		Route::get('/', 'FrontPage\ProfileController@index')->name('dermaster.tentang-kami');
	});

	Route::group(['prefix' => 'products'], function(){
		Route::get('/', 'FrontPage\ProductsController@index')->name('dermaster.products');
		Route::get('/show/{id}', 'FrontPage\ProductsController@show')->name('dermaster.products.show');
		Route::get('/{category}', 'FrontPage\ProductsController@showByCategory')->name('dermaster.products.category');
	});

	Route::group(['prefix' => 'treatments'], function(){
		Route::get('/', 'FrontPage\TreatmentsController@index')->name('dermaster.treatments');
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

	Route::group(['prefix' => 'gallery'], function(){
		Route::get('/show', 'FrontPage\GalleryController@index')->name('dermaster.gallery');
	});

	#cek point
	Route::get('/checkpoint', 'FrontPage\CheckPointController@index')->name('dermaster.check-point');
	Route::post('/checkpoint-store', 'FrontPage\CheckPointController@store')->name('dermaster.checkpoint.store');
	Route::get('/checkpoint-report/{idtrx}/{no_hp}', 'FrontPage\CheckPointController@report')->name('dermaster.checkpoint.report');

	#kontak
	Route::get('/kontak', 'FrontPage\KontakController@index')->name('dermaster.kontak');

	#price list
	Route::get('/price-list', 'FrontPage\PriceListController@index')->name('dermaster.price-list');

	#feedback
	Route::get('/feedback/{no}', 'FrontPage\FeedbackController@index')->name('dermaster.feedback');

	#kemitraan
	Route::get('/kemitraan', 'FrontPage\KemitraanController@index')->name('dermaster.kemitraan');
	Route::post('/store-kemitraan', 'FrontPage\KemitraanController@store')->name('dermaster.kemitraan.store');
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

		#icon best seller
		Route::get('/best_seller', 'Admin\core\BestSellerController@index')->name('produk.best_seller');
		Route::get('/best_seller_insert', 'Admin\core\BestSellerController@insert')->name('produk.best_seller.insert');
		Route::post('/best_seller_store', 'Admin\core\BestSellerController@store')->name('produk.best_seller.store');
		Route::get('/best_seller_edit/{id}', 'Admin\core\BestSellerController@edit')->name('produk.best_seller.edit');
		Route::post('/best_seller_update/{id}', 'Admin\core\BestSellerController@update')->name('produk.best_seller.update');
		Route::get('/best_seller_delete/{id}', 'Admin\core\BestSellerController@delete')->name('produk.best_seller.delete');
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


		Route::get('/active-menu', 'Admin\core\MenuFrontPageController@active')->name('menu_front_page.active');
		Route::get('/non-active-menu', 'Admin\core\MenuFrontPageController@nonactive')->name('menu_front_page.nonactive');
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

	#inbox
	Route::group([
		'prefix' => 'inbox'
	], function(){
		Route::get('/', 'Admin\core\InboxAndCommentsController@index')->name('inbox.index');
		Route::get('/actived/{id_comments}', 'Admin\core\InboxAndCommentsController@actived')->name('comments.actived');
		Route::post('/inbox/post', 'Admin\core\InboxAndCommentsController@post_inbox')->name('inbox.post');
		Route::post('/comment/post', 'Admin\core\InboxAndCommentsController@post_comment')->name('comment.post');
	});

	#setup
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'setup'
	], function(){
		Route::get('/settings', 'Admin\core\SetupController@settings')->name('setup.settings');
		Route::post('/store_settings', 'Admin\core\SetupController@store_settings')->name('setup.store_settings');
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

	#upload wysiwyg
	Route::post('/uploadimagewysywig', 'Admin\core\UploadImageBase64@uploadImage');
	Route::post('/deleteimagewysywig', 'Admin\core\UploadImageBase64@deleteImage');

	#promo
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'promo'
	], function(){
		Route::get('', 'Admin\core\PromoController@index')->name('promo.index');
		Route::get('/insert', 'Admin\core\PromoController@insert')->name('promo.insert');
		Route::post('/store', 'Admin\core\PromoController@store')->name('promo.store');
		Route::get('/edit/{id}', 'Admin\core\PromoController@edit')->name('promo.edit');
		Route::post('/update/{id}', 'Admin\core\PromoController@update')->name('promo.update');
		Route::get('/delete/{id}', 'Admin\core\PromoController@delete')->name('promo.delete');

	});

	#online store
	Route::group([
		'middleware' => 'middleware',
		'prefix' => 'online_store'
	], function(){
		Route::get('/', 'Admin\core\OnlineStoreController@index')->name('online_store.index');
		Route::get('/insert', 'Admin\core\OnlineStoreController@insert')->name('online_store.insert');
		Route::post('/store', 'Admin\core\OnlineStoreController@store')->name('online_store.store');
		Route::get('/edit/{id}', 'Admin\core\OnlineStoreController@edit')->name('online_store.edit');
		Route::post('/update/{id}', 'Admin\core\OnlineStoreController@update')->name('online_store.update');
		Route::get('/delete/{id}', 'Admin\core\OnlineStoreController@delete')->name('online_store.delete');
	});
	
	#share
	Route::get('/share/promo/{seo}', 'FrontPage\SharePromoController@index');
#end route backend