<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property string $username
 * @property string $role
 * @property string $ratings
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class Testimonial extends Model
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
    protected $fillable = ['title', 'slug', 'image', 'description', 'username', 'role', 'ratings', 'status', 'created_at', 'updated_at'];

}
