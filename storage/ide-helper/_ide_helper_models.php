<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace Impress{
/**
 * Impress\Author
 *
 * @property integer $id 
 * @property string $email 
 * @property string $password 
 * @property string $remember_token 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|Content[] $contents 
 * @property-write mixed $password_hashed 
 * @method static \Illuminate\Database\Query\Builder|\Impress\Author whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Author whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Author wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Author whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Author whereUpdatedAt($value)
 */
	class Author {}
}

namespace Impress{
/**
 * Impress\Category
 *
 * @property integer $id 
 * @property string $name 
 * @property string $slug 
 * @property integer $color_id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read CategoryColor $color 
 * @property-read \Illuminate\Database\Eloquent\Collection|Content[] $contents 
 * @method static \Illuminate\Database\Query\Builder|\Impress\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Category whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Category whereColorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Category whereUpdatedAt($value)
 */
	class Category {}
}

namespace Impress{
/**
 * Impress\CategoryColor
 *
 * @property integer $id 
 * @property string $hex 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $category 
 * @method static \Illuminate\Database\Query\Builder|\Impress\CategoryColor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\CategoryColor whereHex($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\CategoryColor whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\CategoryColor whereUpdatedAt($value)
 */
	class CategoryColor {}
}

namespace Impress{
/**
 * Impress\Content
 *
 * @property integer $id 
 * @property string $title 
 * @property string $slug 
 * @property string $text 
 * @property integer $type_id 
 * @property integer $author_id 
 * @property integer $category_id 
 * @property \Carbon\Carbon $published_at 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @property-read Type $type 
 * @property-read Author $author 
 * @property-read Category $category 
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereAuthorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content wherePublishedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Content whereUpdatedAt($value)
 * @method static \Impress\Content published()
 */
	class Content {}
}

namespace Impress{
/**
 * Impress\Model
 *
 */
	class Model {}
}

namespace Impress{
/**
 * Impress\Type
 *
 * @property integer $id 
 * @property string $name 
 * @property integer $sort 
 * @property-read \Illuminate\Database\Eloquent\Collection|Content[] $contents 
 * @method static \Illuminate\Database\Query\Builder|\Impress\Type whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Type whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Impress\Type whereSort($value)
 */
	class Type {}
}

