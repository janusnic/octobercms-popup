<?php namespace Ebussola\Popup\Components;

use Cms\Classes\ComponentBase;
use Ebussola\Popup\Classes\PopupHelper;
use Ebussola\Popup\Classes\PopupService;

class Popup extends ComponentBase
{

    /**
     * @var string
     */
    public $content;

    /**
     * @inheritdoc
     */
    public function componentDetails()
    {
        return [
            'name'        => 'Popup',
            'description' => 'Add a popup to your page'
        ];
    }

    /**
     * @inheritdoc
     */
    public function defineProperties()
    {
        return [
            'popup' => [
                'title' => 'Popup',
                'description' => 'Choose a popup',
                'type' => 'dropdown',

            ]
        ];
    }

    /**
     * @return array
     */
    public function getPopupOptions()
    {
        return \Ebussola\Popup\Models\Popup::all(['id', 'name'])->lists('name', 'id');
    }

    public function onRun()
    {
        $popupService = new PopupService();
        $popups = $popupService->getPopups();
        $this->content = $popupService->renderPopup($popups->random());
    }

}