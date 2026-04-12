<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSale extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sale_id',
    ];

//    public function stock()
//    {
//        return $this->belongsTo(Stock::class);
//    }

    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
