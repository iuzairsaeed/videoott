<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $username
 * @property string $firtname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Order[] $orders
 */
class Customer extends Model
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
    protected $fillable = ['username', 'firtname', 'lastname', 'email', 'phone', 'password', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
