<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $guarded = [];

    public static function getStatus(): array
    {
        return [
            0 => 'Pending',
            1 => 'Completed',
        ];
    }
}
