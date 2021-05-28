<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * Class Cash
 * @package App\Models
 * @version May 27, 2021, 8:05 am UTC
 *
 * @property string $name
 * @property number $amount
 * @property string $currency
 */
class Cash extends Model
{


    public $table = 'cashes';
    
    public $timestamps = false;




    public $fillable = [
        'name',
        'amount',
        'currency'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'amount' => 'double',
        'currency' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
    public function Transactions(){
        return $this->hasMany(Transaction::class);
    }
    
}
