<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMapping extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'distributor_id',
    ];
}
