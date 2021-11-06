<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MachineRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['created', 'shift'];

    public function machine(){
        return $this->belongsTo(Machine::class, 'machine_id', 'id')->select('id', 'machine_no', 'machine_type', 'sale_price');
    }
}
