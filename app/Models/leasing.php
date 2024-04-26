<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leasing extends Model
{
    use HasFactory;

    protected $table = 'leasing';

    protected $fillable = [
        'min_amount',
        'max_amount',
        'min_down_payment',
        'max_down_payment',
        'min_time_period',
        'max_time_period',
        'min_interest_rate',
        'max_interest_rate',
        'administration_fee',
    ];
}
