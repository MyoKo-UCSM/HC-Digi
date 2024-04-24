<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'homes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'banner_title',
        'banner_description',
        'banner_image',
        'banner_image_alt',
        'next_conferences',
        'date',
        'location',
        'time',
        'section_two_content',
        'section_two_image',
        'section_two_image_alt',
        'gift_image',
        'welcome_by_chairman',
        'our_themes',
        'organized_by',
        'co_organized_by',
        'sponsored_by',
        'key_date_for_conference',
        'meet_our_speaker',
        'speakers',
        'meta_title',
        'meta_description',
        'meta_image',
        'meta_image_alt',
    ];

    protected $casts = [
        'our_themes'       => 'array',
        'organized_by'    => 'array',
        'co_organized_by' => 'array',
        'sponsored_by'    => 'array',
        'speakers'        => 'array',
    ];

}
