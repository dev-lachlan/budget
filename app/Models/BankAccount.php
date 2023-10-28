<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function moneyIns()
    {
        return $this->belongsToMany(Transaction::class)->where('type', 'money_in');
    }

    public function moneyOuts()
    {
        return $this->belongsToMany(Transaction::class)->where('type', 'money_out');
    }
}
