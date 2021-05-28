<?php

namespace App\Models;

// use Eloquent as Model;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Account
 * @package App\Models
 * @version May 26, 2021, 10:04 am UTC
 *
 * @property string $Name
 * @property string $Type
 * @property number $Amount
 * @property string $Currency
 */
class Account extends Model
{


    public $table = 'accounts';
    
    public $timestamps = false;




    public $fillable = [
        'Name',
        'Type',
        'Amount',
        'Currency'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'Type' => 'string',
        'Amount' => 'double',
        'Currency' => 'string'
    ];
    public function AccountTransactions() {
        return $this->hasMany(Transaction::class, 'account_id', 'id');
    }
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
