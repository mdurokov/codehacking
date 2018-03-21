<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

class Post extends Model //implements SluggableInterface
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
    	'title',
    	'body',
    	'user_id',
    	'photo_id',
    	'category_id'
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function photo(){
    	return $this->belongsTo('App\Photo');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function photoPlaceholder(){
        return "/images/placeholder.png";
    }
}
