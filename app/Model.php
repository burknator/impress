<?php

namespace Impress;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $nullable = [];

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
