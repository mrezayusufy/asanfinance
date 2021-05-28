<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Expense
 * @package App\Models
 * @version May 25, 2021, 6:02 pm UTC
 *
 * @property string $title
 * @property string $amount
 * @property string $owner
 * @property string $dateTime
 */
class Expense extends Model
{


    public $table = 'expenses';
    
    public $timestamps = true;




    public $fillable = [
        'title',
        'amount',
        'owner',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'amount' => 'string',
        'owner' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
