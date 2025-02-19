<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    
        protected $fillable = [
            'product_id',
            'customer_id',
            'status',
            'transaction_date'
        ];
    
        protected $casts = [
            'transaction_date' => 'date',
            'status' => 'string'
        ];
    
        public function product()
        {
            return $this->belongsTo(Product::class);
        }
    
        public function customer()
        {
            return $this->belongsTo(Customer::class);
        }
    
}
