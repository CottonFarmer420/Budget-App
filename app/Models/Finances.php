<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finances extends Model
{
    /** @use HasFactory<\Database\Factories\FinancesFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
