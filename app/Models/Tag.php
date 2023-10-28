<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function moneyIns()
    {
        return $this->belongsToMany(Transaction::class)->where('type', 'money_in');
    }

    public function moneyOuts()
    {
        return $this->belongsToMany(Transaction::class)->where('type', 'money_out');
    }
}
