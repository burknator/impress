<?php namespace Impress;

use Impress\CategoryColor;
use Impress\Content;
use Impress\Model;

class Category extends Model {
	use Flatable;

	protected $fillable = ['name', 'slug', 'color_id'];

	public function color()
	{
		return $this->belongsTo(CategoryColor::class);
	}

	public function contents()
	{
		return $this->hasMany(Content::class);
	}

	protected static $rules = [
		'name'     => 'required|unique:categories,name',
		'slug'     => 'required|unique:categories,slug|alpha_dash',
		'color_id' => 'required|exists:category_colors,id'
	];

	protected static $updateRules = [
		'id'       => 'required|exists:categories,id',
		'name'     => 'required|unique:categories,name,#id#',
		'slug'     => 'required|unique:categories,slug,#id#|alpha_dash',
		'color_id' => 'required|exists:category_colors,id'
	];

}
