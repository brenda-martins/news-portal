<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    

    /**
     *
     * @param  string  $value
     * @return string
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * return category of the post
     */
    public function category(){
        return $this->belongsTo('App\Category', 'category');
    }
}
