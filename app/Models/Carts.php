<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model 
{
    use HasFactory;

    protected $table = 'carts';
    protected $fillable = ["id", "name", "image", "amount", "price", "weight"]; // Include 'id' for the product identifier
    protected $primaryKey = "idCart"; // Primary key is idCart
    public $incrementing = true; // Auto-incrementing the primary key
}

