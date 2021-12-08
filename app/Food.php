<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $food_category_id
 * @property string $title
 * @property string $slug
 * @property string $featured_image
 * @property string $description
 * @property string $videos
 * @property string $images
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property FoodCategory $foodCategory
 */
class Food extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['food_category_id', 'title', 'slug', 'featured_image', 'description', 'videos', 'images', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function foodCategory()
    {
        return $this->belongsTo('App\FoodCategory');
    }
}
