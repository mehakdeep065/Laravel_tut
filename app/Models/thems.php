<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thems extends Model
{
    use HasFactory;
     protected $table = 'thems'; // ✅ must be set, because table name is settings not thems
    protected $fillable = ['key', 'value'];
    public $timestamps = false; 
}
