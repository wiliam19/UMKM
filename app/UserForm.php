<?php

namespace App;

use Kris\LaravelFormBuilder\Form;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class UserForm extends Form
{
    public function buildForm()
    {
        $this
        	->add("username", 'text')
        	->add("password", 'password')
        	->add("level")
        	->add("kecamatan", 'select',[
        		'choices' => $this->getKecamatan(),
        	])	
        	->add("kelurahan", 'select',[
        		'choices' => $this->getKelurahan(),
        	])
        	->add("alamat")
        	->add("Simpan", 'submit')
        ;

    }

    public function getClient()
    {
    	return new Client([
    		'headers' => [
    			'Content-Type' => 'application/json',
    			'Accept' => 'application/json',
    			'Authorization' => "Bearer " .
   		env('SAMARINDA_TOKEN'),
    		],
		]);
    }

    public function getKelurahan()
    {
    	$kelurahan = [];
    	try {
    	$response = $this->getClient()->get(env('API_KELURAHAN'));
    	$data = json_decode($response->getBody());
    	foreach($data as $item) {
    		$kelurahan[$item->nama] = $item->nama;
    	}

    	return $kelurahan;

    	}catch(ClientException $e) {
    		echo 'Periksa Koneksi atau Token';
    		throw $e;
    	}
    }

    public function getKecamatan()
    {
    	$kecamatan = [];
    	try {
        $response = $this->getClient()->get(env('API_KECAMATAN'));
    	$data = json_decode($response->getBody());
    	foreach($data as $item) {
    		$kecamatan[$item->nama] = $item->nama;
    	}

    	return $kecamatan;

    	}catch(ClientException $e) {
    		echo 'Periksa Koneksi atau Token';
    		throw $e;
    	}
    }
}
