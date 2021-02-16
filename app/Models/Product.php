<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'categories_id',
        'price',
        'stock',
        'photo',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
