<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $plan_id
 * @property integer $order_id
 * @property string $name_on_card
 * @property string $card_no
 * @property string $promocode
 * @property string $transaction_id
 * @property string $type
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 * @property Plan $plan
 */
class Payment extends Model
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
    protected $fillable = ['plan_id', 'order_id', 'name_on_card', 'card_no', 'promocode', 'transaction_id', 'type', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }
}
