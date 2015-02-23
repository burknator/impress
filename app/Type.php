<?php namespace Impress;

use Illuminate\Database\Eloquent\Model;
use Impress\Content;

class Type extends Model {
	protected $fillable = ['name'];

	public $timestamps = false;

	public function contents()
	{
		return $this->hasMany(Content::class);
	}

	/**
	 * Creates a "flat" array list of all types.
	 *
	 * Example:
	 * [
	 *      '3' => 'typeName',
	 *      '7' => 'typeName2',
	 * ]
	 *
	 * @return array
	 */
	public static function flatList()
	{
		$types = static::all()->sortBy('sort')->toArray();
		$list = [];
		foreach ($types as $type)
		{
			$list[$type['id']] = $type['name'];
		}

		return $list;
	}
}