<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
	protected $table = "kendaraan";
	protected $fillable = ["pemilik_id", 'nopol', 'deposit'];

	public function pemiliki() 
	{ 
		return $this->belongsTo(User::class, 'pemilik_id', 'id')
		; 
	}

}