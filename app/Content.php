<?php namespace Impress;

use Impress\Model\ValidatableInterface;
use Impress\Model\ValidatableTrait;
use Illuminate\Database\Eloquent\Model;

class Content extends Model implements ValidatableInterface
{
	use ValidatableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contents';

	protected $fillable = ['title', 'slug', 'text', 'last_editor', 'type_id'];

	public static $validationRules = [
		'title'       => 'required|unique:contents',
		// TODO We actually should validate that this contains only dashes and alphanumerics.
		'slug'        => 'required|unique:contents',
		'type_id'     => 'required|exists:types,id',
		'last_editor' => 'exists:authors,id',
	];

	public function type()
	{
		return $this->belongsTo('Type');
	}

}
