<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable=[
        'floor',
        'title',
        'description',
        'banner',
        'banner_link',
        'category_id'
    ];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function workTime()
    {
        return $this->hasMany(WorkTime::class);
    }
}
