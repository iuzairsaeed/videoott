<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $category_id
 * @property integer $sub_category_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $price
 * @property string $qty
 * @property string $availability
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property ProductCategory $productCategory
 * @property ProductSubCategory $productSubCategory
 * @property ProductImage[] $productImages
 */
class Product extends Model
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
    protected $fillable = ['category_id', 'sub_category_id', 'title', 'slug', 'description', 'price', 'qty', 'availability', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productSubCategory()
    {
        return $this->belongsTo('App\ProductSubCategory', 'sub_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }
}
