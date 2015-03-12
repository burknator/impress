<?php namespace Impress;

use Illuminate\Database\Eloquent\Model;
use Impress\CategoryColor;
use Impress\Content;

class Category extends Model {

	protected $fillable = ['name', 'slug', 'color_id'];

    public function color()
    {
        return $this->belongsTo(CategoryColor::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public static function getRules()
    {
        return [
            'name' => 'required|unique:categories,name',
            'slug' => 'required|unique:categories,slug|alpha_dash',
            'color_id' => 'required|exists:category_colors,id'
        ];
    }

}
