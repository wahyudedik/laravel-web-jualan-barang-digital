<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'product_type',
        'link_video',
        'link_demo',
        'picture',
        'price',
        'promotion_percent',
        'promotion_price',
        'link_project',
        'is_active'
    ];

    protected $casts = [
        'picture' => 'array',
        'price' => 'decimal:2',
        'promotion_percent' => 'integer',
        'promotion_price' => 'integer',
        'is_active' => 'boolean'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
