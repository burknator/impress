<?php namespace Impress;

trait Flatable {
    /**
     * Creates a "flat" list of all entities of this model.
     *
     * Example:
     * [
     *      '3' => 'name',
     *      '7' => 'name2',
     * ]
     *
     * @return array
     */
    public static function flatList()
    {
        $entities = static::all()->sortBy('sort')->toArray();
        $attribute = isset(self::$flattenAttribute) ? self::$flattenAttribute : 'name';
        $list = [];

        foreach ($entities as $entity)
        {
            $list[$entity['id']] = $entity[$attribute];
        }

        return $list;
    }

}