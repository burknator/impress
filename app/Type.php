<?php namespace Impress;

use Impress\Model;
use Impress\Content;

class Type extends Model {
	use Flatable;

	protected $fillable = ['name'];

	public $timestamps = false;

	public function contents()
	{
		return $this->hasMany(Content::class);
	}

    protected static function isType($name)
    {
        return in_array($name, static::flatList());
    }

    /**
     * Magically find a type via Type::typeName().
     *
     * @param  string $name
     * @param  array  $args
     * @return Impress\Type
     */
    public static function __callStatic($name, $args)
    {
        if ( ! static::isType($name)) return parent::__callStatic($name, $args);

        return static::where('name', '=', $name)->firstOrFail();
    }

}