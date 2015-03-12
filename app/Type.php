<?php namespace Impress;

use Illuminate\Database\Eloquent\Model;
use Impress\Content;

class Type extends Model {
	use Flatable;

	protected $fillable = ['name'];

	public $timestamps = false;

	public function contents()
	{
		return $this->hasMany(Content::class);
	}

}