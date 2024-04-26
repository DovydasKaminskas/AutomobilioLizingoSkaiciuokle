<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leasing extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_time_period',
        'max_time_period',
        'min_amount',
        'max_amount',
        'min_interest_rate',
        'administration_fee',
        'min_down_payment',
    ];
}
