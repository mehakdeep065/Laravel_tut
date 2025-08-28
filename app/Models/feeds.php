<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feeds extends Model
{
    use HasFactory;
    protected $table = 'feeds';
    protected $fillable = ['title','description','category','link'];
}
