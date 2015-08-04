<?php namespace Ebussola\Popup\Models;

use Model;

/**
 * Layout Model
 */
class Layout extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ebussola_popup_layouts';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = ['pages' => '\Ebussola\Popup\Models\Popup'];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}