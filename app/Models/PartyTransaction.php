<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartyTransaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['created', 'party_id'];

    public function party(){
        return $this->belongsTo(Party::class, 'party_id', 'id')->select(['id', 'name', 'mobile', 'address', 'initial_balance']);
    }
}
