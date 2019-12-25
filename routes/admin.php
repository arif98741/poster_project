<?php

// Route::get('/home', function () {
//     $users[] = Auth::user();
//     $users[] = Auth::guard()->user();
//     $users[] = Auth::guard('admin')->user();

//     //dd($users);

//     return view('admin.home');
// })->name('home');

Route::namespace('Admin')->group(function () {
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::match(['get', 'post'], 'setting', 'AdminController@setting')->name('setting');

    Route::resource('blog_category', 'BlogcategoryController');
    Route::resource('blog', 'BlogPostController');
    Route::resource('poster_category', 'PosterCategoryController');
});