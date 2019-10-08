<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    protected$table="parkir";
    protected$fillable=["kendaraan_id",'nominal','status','petugas_id'];

}
