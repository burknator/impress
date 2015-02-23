<?php namespace Impress;

use Illuminate\Database\Eloquent\Model;
use Impress\Category;

class CategoryColor extends Model {
    use Flattable;

	protected $fillable = ['hex'];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

}
