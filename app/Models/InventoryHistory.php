<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class InventoryHistory extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'new_stock', 'previous_stock','change_date'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
