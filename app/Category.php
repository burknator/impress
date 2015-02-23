<?php namespace Impress;

use Illuminate\Database\Eloquent\Model;
use Impress\CategoryColor;
use Impress\Content;

class Category extends Model {

	protected $fillable = ['name'];

    public function color()
    {
        return $this->belongsTo(CategoryColor::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

}
