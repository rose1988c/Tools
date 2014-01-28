<?php

/** ------------------------------------------
 *  首页
 *  ------------------------------------------
 */
Route::resource('/', 'HomeController'); //no @
Route::get('github', 'HomeController@github'); // open to the world

/** ------------------------------------------
 *  tool Routes
 *  ------------------------------------------
 */
Route::group(array('prefix' => 'tool'), function()
{
    Route::get('/', function()
    {
        return Redirect::to('/');
    });
    Route::resource('icurl', 'AdminDashboardController');
    Route::resource('users', 'AdminUserController');
    Route::resource('blog', 'AdminBlogController');
});

/**
 * Password Routes
 * all routes used below are for the password reset/reminders
 */
Route::get('password/remind', function()
{
    return View::make('passwordReminder');
});

Route::post('password/remind', function()
{
    $credentials = array('email' => Input::get('email'));

    return Password::remind($credentials, function($message, $user)
    {
        $message->subject('Your Password Reminder');
    });
});

Route::get('password/reset/{token}', function($token)
{
    return View::make('auth.reset')->with('token', $token);
});

Route::post('password/reset/{token}', function()
{
    $credentials = array('email' => Input::get('email'));

    return Password::reset($credentials, function($user, $password)
    {
        $user->password = Hash::make($password);

        $user->save();

        return Redirect::to('')
            ->with('flash_success', 'Password has been reset.');
    });
});


/**
 * Login Routes
 * todo: create auth controller and insert the following code below:
 */
Route::get('/login', function()
{
    return View::make('login');
});

Route::post('/login', function()
{
    $rules = array('email' => 'required', 'password' => 'required');
    $messages = array(
 		'required' => 'The :attribute field is required.',
	);
	//$messages = $validator->messages();
    $validator = Validator::make(Input::all(), $rules, $messages);

    if ($validator->fails())
    {
    	// return to the form with errors and input data
        return Redirect::to('/login')
        	->withErrors($validator)
        	->withInput(); 
    }

    if(Auth::attempt( ['email' => Input::get('email'), 'password' => Input::get('password')] )) // make a login attempt
    {
		return Redirect::to('/welcome')
    		->with('flash_notice', 'You are now logged in.');
    }else{
    	return Redirect::to('/login')
        	->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
    }

});

Route::get('logout', array('as' => 'logout', function () 
{
    Auth::logout();

    return Redirect::to('/login')
    	->with('flash_notice', 'You are successfully logged out.');

}))->before('auth');


// config 配置信息
Route::get('config', function () {
   // dd(Config::get('app.locale'));
    return app()->environment();
});

// 程序的异常处理
Route::get('exception', function () {
    throw new AbcException('运行时错误！');
});

// 关于路由参数
/*Route::get('/books/{category}', function($category) {
    return "Books in the {$category} category.";
});*/

Route::get("/books/{id}", 'BookController@view')->where('id', "[0-9]+");
Route::get("/books/{category?}", 'BookController@category');


Route::get('show404', function () {
    //App::abort(404);
    App::abort(404, '找不到页面！');
    
    // throw new Symfony\Component\HttpKernel\Exception\NotFoundHttpException("找不到页面！");
});

class AbcException extends Exception {}