<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function seed()
    {
        for ($i = 0; $i < 30; $i++) {
            static::create(['title' => 'title' . $i,
                'description' => 'description' . $i,
                'type' => $i % 2 === 0 ? 'snacks' : 'beverages',
                'image_path' => 'image_path' . $i]);
        }
    }
}

