<?php namespace Impress;

use Impress\Model;
use Impress\Content;

/**
 * @method static Type post()
 */
class Type extends Model
{
    use Flatable;

    protected $fillable = ['name'];

    public $timestamps = false;

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public static function exists($name)
    {
        return in_array($name, static::flatList());
    }

    /**
     * Magically find a type via Type::typeName().
     *
     * @param  string $name
     * @param  array  $args
     * @return Type
     */
    public static function __callStatic($name, $args)
    {
        if (!static::exists($name)) {
            return parent::__callStatic($name, $args);
        }

        return static::where('name', '=', $name)->firstOrFail();
    }
}
