<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = ['name', 'alias', 'intro', 'image', 'link', 'view', 'comment', 'source', 'user_id', 'cate_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
