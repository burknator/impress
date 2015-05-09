<?php namespace Impress;

use Impress\Model;
use Impress\Content;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Author extends Model implements AuthenticatableContract, CanResetPasswordContract {
	use Authenticatable, CanResetPassword;

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

	protected static $rules = [
		'email'    => 'required|email|unique:authors,email',
		'password' => 'required|confirmed',
	];

	protected static $updateRules = [
		'id'       => 'required|exists:authors,id',
		'email'    => 'required|email|unique:authors,email,#id#',
		'password' => 'confirmed',
	];

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
