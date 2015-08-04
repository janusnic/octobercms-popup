<?php namespace Ebussola\Popup\Models;

use Cms\Classes\Layout;
use Cms\Classes\Page;
use Cms\Classes\Theme;
use Model;

/**
 * Popup Model
 */
class Popup extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ebussola_popup_popups';

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
    public $hasMany = [];
    public $belongsTo = ['layout' => '\Ebussola\Popup\Models\Layout'];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    /**
     * @return array
     */
    public function getContentPageOptions()
    {
        return Page::getNameList();
    }

}