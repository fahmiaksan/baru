<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'image',
    ];



    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    use HasFactory;
}
