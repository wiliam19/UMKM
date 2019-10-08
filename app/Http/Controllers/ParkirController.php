<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class ParkirController extends Controller
{
	use FormBuilderTrait;
    function inputParkir()
    {
    	$user1 = new \App\Parkir;

		$user1->fill([
		'kendaraan_id' => '0001',
		'nominal' => '5000',
		'status' => 'terbayar',
		'petugas_id' => 'admin'
		]) ->save();

    }

    function tampilParkir ()
    {
    	$parkir = \App\Parkir::all();
    	$data = [
    		'parkir' => $parkir
    	];
    	return view("tampil-parkir", $data);
    }
    function formParkir()
    {
    	$form = $this->form(\App\ParkirForm::class, [
    		'method' => 'post',
    		'url' =>'/simpan-parkir'
    	]);

    	$data = [
    		'form' => $form
    	];

    	return view("form-parkir", $data);
    }
    function simpanParkir(Request $request)
    {
    	$parkir = new \App\Parkir();
    	$parkir->fill($request->all())->save();

    	return redirect('/tampil-parkir');
    }
    function formEditParkir($id)
    {
    	$parkir =\App\Parkir::find($id);
    	$form =$this->form(\App\ParkirForm::class, [
    		'method' => 'post',
    		'url' => '/update-parkir/' . $id,
    		'model' => $parkir
    	]);

    	$data = [
    		'form' => $form
    	];

    	return view("form-parkir", $data);
    }
    function updateParkir($id, Request $request)
	{
		$parkir = \App\Parkir::find($id);
		$parkir->fill($request->all())->save();

		return redirect('/tampil-parkir');
	}
	function deleteParkir($id)
	{
		$parkir =\App\Parkir::find($id);
		$parkir->delete();
		return redirect('/tampil-parkir');
	} 
}