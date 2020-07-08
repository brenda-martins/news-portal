<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'author', 'content', 'image', 'spotlight'
    ];



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
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category');
    }


    /**
     * Retorna o autor do post especificado
     */

    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author');
    }

    public function visitors()
    {
        return $this->hasMany('\App\Models\Visitor', 'post');
    }

    /**
     * @param string $category
     * @return null|array
     */
    public function filterByCategory(string $category)
    {
        return Post::join('categories', 'posts.category', '=', 'categories.id')
            ->where('categories.name', $category)
            ->where('spotlight', 0)
            ->orderBy('posts.created_at', 'desc')
            ->take(6)
            ->get();
    }
}
