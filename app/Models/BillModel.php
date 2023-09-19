<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $guarded = [];

    public function customer(){
        $this->belongsTo(\App\Models\CustomerModel::class,'customer_id');
    }
    public function project(){
        $this->belongsTo(\App\Models\ProjectModel::class,'project_id');
    }
}
