<?php

namespace App\Models\Fqr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $attributes = [
        'entityStatus' => 'A'
     ];
}
