<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasjangHeavyModel extends Model
{
    use HasFactory;

    protected $table = 'heavyWasjangs';
    protected $guarded = [];
}
