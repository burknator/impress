<?php namespace Impress;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{

    protected $nullable = [];

    protected static $rules = [];

    protected static $updateRules = [];

    /**
     * Listen for save event
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            self::setNullables($model);
        });
    }

    public static function getRules()
    {
        return static::$rules;
    }

    /**
     * @param mixed $id ID of the model which will be checked.
     * @return array
     */
    public static function getUpdateRules($id)
    {
        if (empty($id)) {
            throw new \BadMethodCallException("You need to provide an ID in order get generate update rules.");
        }

        return array_map(function ($rule) use ($id) {
            return str_replace([',#id#', '#id#'], [',' . $id, $id], $rule);
        }, static::$updateRules);
    }

    /**
     * Set empty nullable fields to null
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    protected static function setNullables($model)
    {
        foreach ($model->nullable as $field) {
            if (empty($model->{$field})) {
                $model->{$field} = null;
            }
        }
    }
}
