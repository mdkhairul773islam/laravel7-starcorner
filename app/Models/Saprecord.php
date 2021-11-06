<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Saprecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['voucher_no', 'discount', 'total_bill', 'status'];


    public function party(){
        return $this->belongsTo(Party::class, 'party_id', 'id')->select(['id', 'name', 'mobile', 'address', 'initial_balance']);
    }

    public function transaction(){
        return $this->belongsTo(PartyTransaction::class, 'voucher_no', 'relation')->select(['id', 'debit', 'credit', 'relation']);
    }

}
