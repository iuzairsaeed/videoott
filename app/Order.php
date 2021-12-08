<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $customer_id
 * @property string $order_no
 * @property string $subtotal
 * @property string $netamount
 * @property string $discount
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Customer $customer
 * @property OrderDetail[] $orderDetails
 * @property Payment[] $payments
 * @property ShippingDetail[] $shippingDetails
 */
class Order extends Model
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
    protected $fillable = ['customer_id', 'order_no', 'subtotal', 'netamount', 'discount', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shippingDetails()
    {
        return $this->hasMany('App\ShippingDetail');
    }
}
