<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'orders_id',
        'total_price',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id', 'id');
    }
}
