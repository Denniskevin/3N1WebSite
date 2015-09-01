<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    const TYPE_COMMENT_TOPIC    = 1;
    const TYPE_COMMENT_BLOG     = 2;
    const TYPE_COMMENT_ARTICLE  = 3;

    /**
     *
     */
    public function entity()
    {
        return $this->belongsTo('App\Content', 'entity_id');
    }

    /**
     *
     */
    public function offerUser()
    {
        return $this->belongsTo('App\User', 'offer_user_id');
    }
}
