<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmaNewsFeatured extends Model
{
    use HasFactory;
    protected $table = 'gma_news_featured';

    protected $fillable = [
        'url',
        'image_url',
        'title',
        'zoom',
        'position',
    ];






}
