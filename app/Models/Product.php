<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'tax',
    ];

    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }

    public function getPriceWithTaxAttribute()
    {
        return ( ($this->price * $this->tax) / 100) + $this->price;
    }

    public function getTaxAmountAttribute()
    {
        return ($this->price * $this->tax) / 100;
    }
}
