<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GmaNew extends Model
{
    use HasFactory;
    protected $table = 'gma_news';

    protected $fillable = [
            'id',
            'title',
            'date',
            'teaser',
            'photo_id',
            'base_url',
            'image_filename',
            'type',
            'photo_credit',
            'sec_id',
            'ssec_id',
            'ssec_photo',
            'youtube_id',
            'show_id',
            'thumbnail_status',
            'permanent_url',
            'tags',
            'photo_title',
            'sec_name',
            'sec_stub',
            'sec_url_stub',
            'color_code',
            'ssec_name',
            'ssec_stub',
            'show_stub',
            'link',
            'date_time',
            'is_publish',
    ];


}
