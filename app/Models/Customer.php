<?php

namespace App\Models;

// use Eloquent as Model;
use Illuminate\Database\Eloquent\Model;



/**
 * Class Customer
 * @package App\Models
 * @version May 26, 2021, 10:10 am UTC
 *
 * @property string $Name
 * @property number $Amount
 */
class Customer extends Model
{


    public $table = 'customers';
    
    public $timestamps = false;

    public $fillable = [
        'Name',
        'Amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Name' => 'string',
        'Amount' => 'double'
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
