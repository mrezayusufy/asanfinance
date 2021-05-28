<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Post
 * @package App\Models
 * @version May 26, 2021, 6:28 pm UTC
 *
 * @property string $post_title
 * @property integer $post_category_id
 * @property string $post_content
 */
class Post extends Model
{


    public $table = 'posts';
    
    public $timestamps = false;




    public $fillable = [
        'post_title',
        'post_category_id',
        'post_content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'post_title' => 'string',
        'post_category_id' => 'integer',
        'post_content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
