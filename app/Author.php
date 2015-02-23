<?php namespace Impress;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Impress\Contracts\ValidatableContract;
use Impress\Validatable;
use Impress\Content;

class Author extends Model implements AuthenticatableContract, CanResetPasswordContract, ValidatableContract
{
	use Authenticatable, CanResetPassword, Validatable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'authors';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * Massassignable attributes of this model.
	 * @var array
	 */
	protected $fillable = ['email', 'password'];

	/**
	 * Get the validation rules for this model.
	 *
	 * @return array
	 */
	public static function getRules()
	{
		return [
			'email'    => 'required|email',
			'password' => 'required|confirmed',
		];
	}

	public function contents()
	{
		return $this->hasMany(Content::class);
	}

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}

	public function setPasswordHashedAttribute($hashedPassword)
	{
		$this->attributes['password'] = $hashedPassword;
	}

}
