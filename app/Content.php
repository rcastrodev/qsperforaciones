<?php

namespace App;

use App\Image;
use App\Section;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['section_id', 'order', 'image', 'content_1', 'content_2', 'content_3', 'content_4', 'content_5', 'content_6', 'content_7'];

    public function section()
    {
        return $this->belongsTo (Section::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
