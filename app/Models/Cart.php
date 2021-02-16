<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function table()
    {
        return $this->hasOne(Table::class, 'id', 'tables_id');
    }
}
