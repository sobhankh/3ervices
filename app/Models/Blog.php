<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable =[
      'title',
      'description',
      'content',
      'img',
      'tags',
      'menu_id',
      'name_services_id'
    ];
}
