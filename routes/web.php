<?php

Route::get('/', 'Web\HomeController@index');
Route::get('/search', 'Web\HomeController@search');
Route::get('/admin', function () {
    return redirect('admin/login');
});




// Blog Section
Route::namespace('Web')->group(function () {

    Route::group(['prefix' => 'blog'], function () {
        Route::get('/', 'BlogController@index');
        Route::get('/{slug}', 'BlogController@show_by_slug')->name('blog.show.slug');
    });

    Route::get('about', 'PageController@about');
    Route::get('help', 'PageController@help');
    Route::get('contact', 'PageController@contact');
    Route::get('company/companies-landing', 'HomeController@company_landing');

    Route::get('company/pricing', 'HomeController@pricing');
    Route::get('reviewer/row-listing', 'HomeController@row_listings');
    Route::get('reviewer/reviews', 'HomeController@review');
    Route::get('company/category-companies-listing/{order}', 'HomeController@category_listing');

    Route::get('reviewer/profile/{username}', 'HomeController@profile');
    Route::get('reviewer/setting', 'Reviewer\ReviewerController@setting');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Admin\Auth\LoginController@login');
    Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::get('/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Admin\Auth\RegisterController@register');

    Route::post('/password/email', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'Admin\Auth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'Admin\Auth\ResetPasswordController@showResetForm');
});