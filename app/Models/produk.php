<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $table = "produk";

    public function user_produk()
    {
    	return $this->belongsTo('User::class');
    }
}
