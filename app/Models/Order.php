<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tables_id',
        'amount',
        'custumer_name',
        'phone_number',
        'gender',
        'address',
        'code',
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'tables_id', 'id');
    }
}
