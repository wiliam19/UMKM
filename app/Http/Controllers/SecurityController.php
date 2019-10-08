<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\LoginForm;
use App\User;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
	public function login(FormBuilder $formBuilder)
	{
	    $form = $formBuilder->create(LoginForm::class, [
	    	'method' => 'POST',
	    	'url' => '/login'
	    ]);
	    $data = [
	    	'form' => $form
	    ];
	    return view('login', $data);
	}

public function prosesLogin(Request $request)
{
	$user = User::where('username', $request->get('username'))
		->where('password', $request->get('password'))->first();

	if($user == null) {
		return back()->withMessage("Invalid Username and Password");
	}

	Auth::login($user);

	return redirect('/')->withMessage("Welcome to the system");
}

public function logout()
{
	Auth::logout();
	return redirect('/')->withMessage("Goodbye !");
}
}
