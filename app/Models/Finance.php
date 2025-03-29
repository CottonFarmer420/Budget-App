<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{

    use HasFactory;

    protected $fillable = [
        'monthly_income',
        'fixed_costs',
        'variable_costs',
        'saving_amount',
        'saving_target',
        'debts',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
