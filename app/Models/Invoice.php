<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'total_tax',
    ];

    protected $with = ['purchases'];

    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }

    public function getTotalWithTaxAttribute()
    {
        return $this->total + $this->total_tax;
    }
}
