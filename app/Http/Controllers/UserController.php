<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use App\UserForm;
use App\User;

class UserController extends Controller
{
	use FormBuilderTrait;

    function tampilUser()
    {
    	$users = \App\User::all();

    	$data = [
    		'users' => $users 
    	];
    	return view("tampil-user", $data);

    }

    function formUser()
    {
    	$form = $this->form(\App\UserForm::class, [
    		'method' => 'post',
    		'url' => '/simpan-user'
    	]);

    	$data =[
    		'form' => $form
    	];

    	return view("form-user", $data);
    }

    
	function simpanUser(Request $request)
	{ 
		$user = new \App\User();
		$user->fill($request->all())->save();

		return redirect('/login');
	} 

	function formEditUser($id)
	{
		$user = \App\User::find($id);
		$form = $this->form(\App\UserForm::class, [
			'method' => 'post',
			'url' => '/update-user/' . $id,
			'model' => $user
		]);

		$data = [
			'form' => $form
		];

		return view("form-user", $data);
	}

	function updateUser($id, Request $request)
	{ $user = \App\User::find($id); 
		$user->fill($request->all())->save();

	return redirect('/tampil-user');

	}

	function deleteUser($id)
	{
		$user = \App\User::find($id); 
		$user->delete(); 
		return redirect('/tampil-user');
	}

	public function index()
	{
		$users = User::all();
		$data = [
			'users' => $users
		];
		return view("users.index", $data);
	}

}
