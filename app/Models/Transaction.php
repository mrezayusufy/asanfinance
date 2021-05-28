<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Transaction
 * @package App\Models
 * @version May 26, 2021, 6:39 pm UTC
 *
 * @property string $date
 * @property string $transaction_type
 * @property number $amount
 * @property string $asset
 * @property number $percentage
 * @property number $total
 * @property integer $account_id
 * @property integer $customer_id
 * @property string $status
 */
class Transaction extends Model
{


    public $table = 'transactions';
    
    public $timestamps = true;

    public $fillable = [
        'date',
        'type',
        'amount',
        'address',
        'txId',
        'coin',
        'percentage',
        'total',
        'cur_price',
        'cash_id',
        'cash_amount',
        'account_id',
        'account_amount',
        'customer_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'address' => 'string',
        'txId' => 'string',
        'amount' => 'double',
        'coin' => 'string',
        'percentage' => 'double',
        'total' => 'double',
        'cash_id' => 'integer',
        'cash_amount' => 'double',
        'account_id' => 'integer',
        'account_amount' => 'double',
        'customer_id' => 'integer',
        'status' => 'string'
    ];
    public function Customer() {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function Account() {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
    public function Cash(){
        return $this->belongsTo(Cash::class, 'cash_id', 'id');
    } 

    public static $rules = [
        'txId' => 'required|unique:roles'
    ];
}
