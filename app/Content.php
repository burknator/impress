<?php

namespace Impress;

use Impress\Model;
use Impress\Author;
use Impress\Type;
use Impress\Category;

use Carbon\Carbon;

class Content extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contents';

    protected $fillable = ['title', 'slug', 'text', 'type_id', 'category_id'];

    protected $nullable = ['category_id', 'last_editor_id'];

    protected $appends = ['edit_link'];

    protected $dates = ['published_at'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function lastEditor()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now())
                     ->where('published_at', '<>', '0000-00-00 00:00:00');
    }

    public function scopeDrafts($query)
    {
        return $query->where('published_at', '>', Carbon::now())
                     ->orWhere('published_at', '=', '0000-00-00 00:00:00');
    }

    public function getEditLinkAttribute()
    {
        return route('i.contents.edit', ['contents' => $this->slug]);
    }
}
