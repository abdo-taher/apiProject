<?php

namespace Crm\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteModel extends Model
{
    use HasFactory;
    protected $table = 'notes';
    protected $guarded = [];

    public function customer(){
        $this->belongsTo(\App\Models\CustomerModel::class,'customer_id');
    }
}
