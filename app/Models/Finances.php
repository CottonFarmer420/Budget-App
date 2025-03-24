<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finances extends Model
{
    /** @use HasFactory<\Database\Factories\FinancesFactory> */
    use HasFactory;

    protected $fillable = [
        'monthly_income',
        'fixed_costs',
        'variable_costs',
        'saving_amount',
        'saving_target',
        'debts',
    ];
}
