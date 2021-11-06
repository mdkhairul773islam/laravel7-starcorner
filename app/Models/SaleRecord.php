<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaleRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['created', 'shift'];

    // get user info
    public function userInfo(){
        return $this->hasOne(User::class, 'id', 'user_id')->select('id', 'name', 'mobile', 'address');
    }

    // get machine records
    public function machineRecords(){
        return $this->hasMany(MachineRecord::class, 'sale_record_id', 'id');
    }
}
