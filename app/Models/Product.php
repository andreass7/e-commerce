<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status', 'price', 'image'];

    const STATUS_ACTIVE = 'aktif';
    const STATUS_INACTIVE = 'tidak aktif';

    // Optionally, you can add a method to get status labels
    public static function getStatuses()
    {
        return [
            self::STATUS_ACTIVE => 'Aktif',
            self::STATUS_INACTIVE => 'Tidak Aktif',
        ];
    }
}
