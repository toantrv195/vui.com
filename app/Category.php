<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name', 'alias',];

    public function product()
    {
    	return $this->HasMany(product::class);
    }

    public function video()
    {
    	return $this->HasMany(Video::class);
    }
}
