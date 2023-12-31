<?php

namespace Crm\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillModel extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $guarded = [];

    public function customer(){
        $this->belongsTo(\Crm\Customer\Models\CustomerModel::class,'customer_id');
    }
    public function project(){
        $this->belongsTo(\Crm\Customer\Models\ProjectModel::class,'project_id');
    }

}
