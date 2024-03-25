<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoService extends Model
{
    use HasFactory;
    protected $fillable =
        [
          'slug_service',
          'logo',
          'service_id',
          'city_img',
          'header_baner',
          'header_title_1',
          'header_title_2',
          'footer_title',
          'footer_description',
          'info',
        ];
}
