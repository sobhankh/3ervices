<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameService extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','service_name'];
}
