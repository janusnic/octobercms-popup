<?php namespace Ebussola\Popup\Classes;

use Ebussola\Popup\Models\Popup;
use Illuminate\Database\Eloquent\Collection;


/**
 * Created by PhpStorm.
 * User: shina
 * Date: 8/3/15
 * Time: 8:37 PM
 */
class PopupService
{

    /**
     * @return Popup[] | Collection
     */
    public function getPopups()
    {
        return Popup::all();
    }

    /**
     * @param Popup $popup
     * @return string
     */
    public function renderPopup(Popup $popup)
    {
        $popupHelper = PopupHelper::instance($popup);
        $content = $popupHelper->getContent();

        $layout = '{popup_content}';
        if ($popup->layout != null) {
            $layout = $popup->layout->content;
        }

        return str_replace('{popup_content}', $content, $layout);
    }
    
}