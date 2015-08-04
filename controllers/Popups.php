<?php namespace Ebussola\Popup\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Popups Back-end Controller
 */
class Popups extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Ebussola.Popup', 'popup', 'popups');
    }
}