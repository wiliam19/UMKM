<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class KendaraanController extends Controller
{
    use FormBuilderTrait;
    function inputKendaraan()
    {
    	$user1 = new \App\Kendaraan;

		$user1->fill([
		'pemilik_id' => '0001',
		'deposit' => '5000',
		'nopol' => 'hehehe',
		]) ->save();

    }

    function tampilKendaraan ()
    {
    	$kendaraan = \App\Kendaraan::all();
    	$data = [
    		'kendaraan' => $kendaraan
    	];
    	return view("tampil-kendaraan", $data);
    }
    function formKendaraan()
    {
    	$form = $this->form(\App\KendaraanForm::class, [
    		'method' => 'post',
    		'url' =>'/simpan-kendaraan'
    	]);

    	$data = [
    		'form' => $form
    	];

    	return view("form-kendaraan", $data);
    }
    function simpanKendaraan(Request $request)
    {
    	$kendaraan = new \App\Kendaraan();
    	$kendaraan->fill($request->all())->save();

    	return redirect('/tampil-kendaraan');
    }
    function formEditKendaraan($id)
    {
    	$kendaraan =\App\Kendaraan::find($id);
    	$form =$this->form(\App\KendaraanForm::class, [
    		'method' => 'post',
    		'url' => '/update-kendaraan/' . $id,
    		'model' => $kendaraan
    	]);

    	$data = [
    		'form' => $form
    	];

    	return view("form-kendaraan", $data);
    }
    function updateKendaraan($id, Request $request)
	{
		$kendaraan = \App\Kendaraan::find($id);
		$kendaraan->fill($request->all())->save();

		return redirect('/tampil-kendaraan');
	}
	function deleteKendaraan($id)
	{
		$kendaraan =\App\Kendaraan::find($id);
		$kendaraan->delete();
		return redirect('/tampil-kendaraan');
	} 
    
}
