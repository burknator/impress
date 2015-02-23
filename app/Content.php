<?php namespace Impress;

use Illuminate\Database\Eloquent\Model;
use Impress\Contracts\ValidatableContract;
use Impress\Validatable;
use Impress\Author;
use Impress\Type;

class Content extends Model implements ValidatableContract
{
	use Validatable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contents';

	protected $fillable = ['title', 'slug', 'text', 'type_id'];

	/**
	 * Get the validation rules for this model.
	 *
	 * @return array
	 */
	public static function getRules()
	{
		return [
			'id'      => 'sometimes|required|exists:contents,id',
			'title'   => 'required|unique:contents,title,#id#',
			'slug'    => 'required|alpha_dash|unique:contents,slug,#id#',
			'type_id' => 'required|exists:types,id',
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

}
