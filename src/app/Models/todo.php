<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'content'
    ];
    public function categories()
    {
        // return $this->hasMany('App\Models\Category');
        return $this->belongsTo(Category::class);
    }
}
