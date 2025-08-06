<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_websites extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','website_name','website_description','zip_path'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
