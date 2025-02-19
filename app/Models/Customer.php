<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name', 'email'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
