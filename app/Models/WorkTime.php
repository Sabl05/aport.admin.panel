<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'since',
        'till',
        'shop_id',
        'contact_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'contact_id',
        'shop_id'
    ];
}
