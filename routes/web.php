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

/* Public Routes */

// contacts routes (public)
Route::post('/contacts', 'Admin\\ContactsController@index');

//Story
Route::get('story', 'Publics\\StoryController@index');

// review routes
Route::post('review.submit', 'Publics\\ReviewsController@submitReview');

// apply coupon
Route::post('coupon.apply', 'Admin\\CouponsController@testCoupon');

// home page
Route::get('/home', 'Publics\\HomeController@index');
Route::get('/', 'Publics\\HomeController@index');
Route::get('{locale}', 'Publics\\HomeController@index')
        ->where('locale', implode('|', Config::get('app.locales')));

// open one product
Route::get('{any}-{id}', 'Publics\\ProductsController@productPreview')->where('id', '[\d+]+')->where('any', '(.*)');
Route::get('{locale}/{any}-{id}', 'Publics\\ProductsController@productPreview')
        ->where('locale', implode('|', Config::get('app.locales')))->where('id', '[\d+]+')->where('any', '(.*)');

// open all products
Route::get('products', 'Publics\\ProductsController@index');
Route::get('{locale}/products', 'Publics\\ProductsController@index')
        ->where('locale', implode('|', Config::get('app.locales')));

// open all products with categorie
Route::get('category/{category}', 'Publics\\ProductsController@index')->where('category', '(.*)');
Route::get('{locale}/category/{category}', 'Publics\\ProductsController@index')
        ->where('locale', implode('|', Config::get('app.locales')))->where('category', '(.*)');

// open contacts
Route::get('contacts', 'Publics\\ContactsController@index');
Route::get('{locale}/contacts', 'Publics\\ContactsController@index')
        ->where('locale', implode('|', Config::get('app.locales')));

// send message from contacts
Route::post('contacts', 'Publics\\ContactsController@sendMessage');
Route::post('{locale}/contacts', 'Publics\\ContactsController@sendMessage')
        ->where('locale', implode('|', Config::get('app.locales')));

// save fast order
Route::post('fast-order', 'Publics\\CheckoutController@setFastOrder');
Route::post('{locale}/fast-order', 'Publics\\CheckoutController@setFastOrder')
        ->where('locale', implode('|', Config::get('app.locales')));

// cart
Route::get('cart', 'Publics\\CheckoutController@indexCart');
Route::get('{locale}/cart', 'Publics\\CheckoutController@indexCart')
    ->where('locale', implode('|', Config::get('app.locales')));
		
/* Logged user routes */
Route::middleware(['auth'])->group(function () {
// checkout please
Route::get('checkout', 'Publics\\CheckoutController@index');
Route::get('{locale}/checkout', 'Publics\\CheckoutController@index')
                ->where('locale', implode('|', Config::get('app.locales')));
// add favorite
    Route::get('addFavorite/{id}', ['as' => 'addFavorite', 'uses' => 'Publics\\FavoritesController@addFavorite']);
    Route::get('my_favorites', 'Publics\\FavoritesController@index');

// checkout post req
Route::post('checkout', 'Publics\\CheckoutController@setOrder');
Route::post('{locale}/checkout', 'Publics\\CheckoutController@setOrder')
                ->where('locale', implode('|', Config::get('app.locales')));

// add product to cart from add button (ajax)
Route::post('addProduct', 'Publics\\CartController@addProduct');
// get products and cart html
Route::post('getGartProducts', 'Publics\\CartController@renderCartProductsWithHtml');
// get products and cart html
Route::post('removeProductQuantity', 'Publics\\CartController@removeProductQuantity');
// get products and cart html for checkout page
Route::post('getProductsForCheckoutPage', 'Publics\\CartController@getProductsForCheckoutPage');
// remove product from cart
Route::post('removeProduct', 'Publics\\CartController@removeProduct');

//my_account
Route::get('my_account', 'Publics\\myaccountController@index');
//my_orders
Route::get('my_orders', 'Publics\\myordersController@index');
//support
Route::get('support', 'Publics\\SupportController@index');
Route::post('support', 'Publics\\SupportController@setTicket')->where('locale', implode('|', Config::get('app.locales')));
Route::post('{locale}/publics/support', 'Publics\\SupportController@setTicket');

Route::get('support_message/{id_ticket}', 'Publics\\SupportController@indexTicketMessagePage');
Route::post('support_message/{id_ticket}', 'Publics\\SupportController@sendMessage')->where('locale', implode('|', Config::get('app.locales')));
Route::post('{locale}/publics/support', 'Publics\\SupportController@sendMessage');




});
/* end logged user routes */

/* Administration Routes */
Route::middleware(['Admin'])->group(function () { // check for admin auth
    Route::get('admin', 'Admin\\DashboardController@index');

    // Contacts routes
    Route::post('admin/contacts.add', 'Admin\\ContactsController@addContacts');
    Route::get('admin/contacts', 'Admin\\ContactsController@index');

    Route::get('admin/coupons', 'Admin\\CouponsController@index');
    Route::post('admin/coupon.add', 'Admin\\CouponsController@addCoupon');

    Route::get('{locale}/admin', 'Admin\\DashboardController@index')
            ->where('locale', implode('|', Config::get('app.locales')));
//////////////
    Route::get('admin/publish', 'Admin\\PublishController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/publish', 'Admin\\PublishController@index');
//////////////
    Route::get('admin/edit/pruduct/{number}', 'Admin\\PublishController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/edit/pruduct/{number}', 'Admin\\PublishController@index');
//////////////
    Route::post('admin/publish', 'Admin\\PublishController@setProduct')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/publish', 'Admin\\PublishController@setProduct');
//////////////
    Route::post('admin/edit/pruduct/{number}', 'Admin\\PublishController@setProduct')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/edit/pruduct/{number}', 'Admin\\PublishController@setProduct');
//////////////
    Route::get('admin/products', 'Admin\\ProductsController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/products', 'Admin\\ProductsController@index');
//////////////
    Route::get('admin/categories', 'Admin\\ProductsCategoryController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/categories', 'Admin\\ProductsCategoryController@index');
//////////////
    Route::post('admin/categories', 'Admin\\ProductsCategoryController@setCategory')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/categories', 'Admin\\ProductsCategoryController@setCategory');
//////////////
    Route::post('admin/categories/{number}', 'Admin\\ProductsCategoryController@setCategory')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/categories/{number}', 'Admin\\ProductsCategoryController@setCategory');
//////////////
    Route::get('admin/delete/product/{number}', 'Admin\\ProductsController@deleteProduct')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/product/{number}', 'Admin\\ProductsController@deleteProduct');
//////////////
    Route::get('admin/delete/categories', 'Admin\\ProductsCategoryController@deleteCategories')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/categories', 'Admin\\ProductsCategoryController@deleteCategories');
//////////////
    Route::get('admin/users', 'Admin\\UsersController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/users', 'Admin\\UsersController@index');
//////////////
    Route::post('admin/users', 'Admin\\UsersController@setUser')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/users', 'Admin\\UsersController@setUser');
//////////////
    Route::get('admin/carousel', 'Admin\\CarouselController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/carousel', 'Admin\\CarouselController@index');
//////////////
    Route::post('admin/carousel', 'Admin\\CarouselController@setSlider')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/carousel', 'Admin\\CarouselController@setSlider');
//////////////
    Route::get('admin/delete/user/{userId}', 'Admin\\UsersController@deleteUser')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/user/{userId}', 'Admin\\UsersController@deleteUser');
//////////////
    Route::get('admin/delete/slider/{id}', 'Admin\\CarouselController@deleteSlider')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/slider/{id}', 'Admin\\CarouselController@deleteSlider');
//////////////
/// //////////////
    Route::get('admin/carousel_info', 'Admin\\CarouselController@index_info')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/carousel_info', 'Admin\\CarouselController@index_info');
////////////////
    Route::post('admin/carousel_info', 'Admin\\CarouselController@setSliderInfo')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/carousel_info', 'Admin\\CarouselController@setSliderInfo');
////////////////
    Route::get('admin/delete/sliderInfo/{id}', 'Admin\\CarouselController@deleteSliderInfo')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/sliderInfo/{id}', 'Admin\\CarouselController@deleteSliderInfo');
////////////////
    Route::get('admin/orders', 'Admin\\OrdersController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/orders', 'Admin\\OrdersController@index');
//////////////
    Route::get('admin/fast/ord/is/viewed/{id}', 'Admin\\OrdersController@markFastOrder')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/fast/ord/is/viewed/{id}', 'Admin\\OrdersController@markFastOrder');
//////////////
    Route::post('admin/removeGalleryImage', 'Admin\\PublishController@removeGalleryImage');
//////////////
    Route::post('admin/changeOrderStatus', 'Admin\\OrdersController@changeStatus');
////////////// Expedition
    Route::get('admin/expeditions', 'Admin\\ExpeditionsController@index');
    Route::get('admin/delete/expedition/{userId}', 'Admin\\ExpeditionsController@deleteExpedition')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/expedition/{userId}', 'Admin\\ExpeditionsController@deleteExpedition');
    Route::post('admin/expeditions', 'Admin\\ExpeditionsController@setExpedition')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/expeditions', 'Admin\\ExpeditionsController@setExpedition');
////////////// Producer
    Route::get('admin/producers', 'Admin\\ProducersController@index');
    Route::get('admin/delete/producers/{userId}', 'Admin\\ProducersController@deleteProducer')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/producers/{userId}', 'Admin\\ProducersController@deleteProducer');
    Route::post('admin/producers', 'Admin\\ProducersController@setProducer')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/producers', 'Admin\\ProducersController@setProducer');
////////////// Support
    Route::get('admin/support', 'Admin\\SupportController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/support', 'Admin\\SupportController@index');
    Route::post('admin/changeOrderStatus', 'Admin\\SupportController@changeStatus');

    Route::get('admin/support_message/{id_ticket}', 'Admin\\SupportController@indexTicketMessagePage');
    Route::post('admin/support_message/{id_ticket}', 'Admin\\SupportController@sendMessage')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/support', 'Admin\\SupportController@sendMessage');
////////////// Story
    Route::get('admin/story', 'Admin\\StoryController@index')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/Story', 'Admin\\StoryController@index');
    Route::post('admin/story', 'Admin\\StoryController@setSlider')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/story', 'Admin\\StoryController@setSlider');
    Route::get('admin/delete/story/{id}', 'Admin\\StoryController@deleteSlider')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/story/{id}', 'Admin\\StoryController@deleteSlider');
    Route::post('admin/story/setDate', 'Admin\\StoryController@setImportantDate')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/story/setDate', 'Admin\\StoryController@setImportantDate');
    Route::get('admin/delete/storyDate/{id}', 'Admin\\StoryController@deleteDate')->where('locale', implode('|', Config::get('app.locales')));
    Route::get('{locale}/admin/delete/storyDate/{id}', 'Admin\\StoryController@deleteDate');
    Route::post('admin/story/update', 'Admin\\StoryController@updateInfo')->where('locale', implode('|', Config::get('app.locales')));
    Route::post('{locale}/admin/story/update', 'Admin\\StoryController@updateInfo');
});

// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::get('logout', 'Admin\\UsersController@logout');

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@register'
]);
