<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Input;

use App\Category;

class Article extends Content
{
    /**
     * Query
     */
    public function scopeSelectContents($query)
    {
        return $query->where('type_id', '=', Category::TYPE_ARTICLE);
    }
}
