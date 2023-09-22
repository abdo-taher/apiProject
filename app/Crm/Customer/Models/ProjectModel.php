<?php

namespace Crm\Customer\Models;

use Database\Factories\CreateProject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $guarded = [];

    public function customer(){
        $this->belongsTo(\Crm\Customer\Models\CustomerModel::class,'customer_id');
    }
}
