<?php namespace Impress;

trait Flattable {
    /**
     * Creates a "flat" array list of all types.
     *
     * Example:
     * [
     *      '3' => 'typeName',
     *      '7' => 'typeName2',
     * ]
     *
     * @return array
     */
    public static function flatList()
    {
        $types = static::all()->sortBy('sort')->toArray();
        $list = [];
        foreach ($types as $type)
        {
            $list[$type['id']] = $type['name'];
        }

        return $list;
    }

}