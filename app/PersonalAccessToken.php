<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $tokenable_type
 * @property integer $tokenable_id
 * @property string $name
 * @property string $token
 * @property string $abilities
 * @property string $last_used_at
 * @property string $created_at
 * @property string $updated_at
 */
class PersonalAccessToken extends Model
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
    protected $fillable = ['tokenable_type', 'tokenable_id', 'name', 'token', 'abilities', 'last_used_at', 'created_at', 'updated_at'];

}
