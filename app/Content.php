<?php namespace Impress;

use Impress\Model;
use Impress\Author;
use Impress\Type;
use Impress\Category;

use Carbon\Carbon;

class Content extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contents';

	protected $fillable = ['title', 'slug', 'text', 'type_id', 'category_id'];

	protected $nullable = ['category_id'];

	protected $dates = ['published_at'];

	/**
	 * Get the validation rules for this model.
	 *
	 * @return array
	 */
	public static function getRules()
	{
		return [
			'id'          => 'sometimes|required|exists:contents,id',
			'title'       => 'required|unique:contents,title,#id#',
			'slug'        => 'required|alpha_dash|unique:contents,slug,#id#',
			'type_id'     => 'required|exists:types,id',
			'category_id' => 'exists:categories,id',
		];
	}

	public function type()
	{
		return $this->belongsTo(Type::class);
	}

	public function author()
	{
		return $this->belongsTo(Author::class);
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function scopePublished($query)
	{
		return $query->where('published_at', '<=', Carbon::now());
	}

}
