<?php namespace Ebussola\Popup;

use System\Classes\PluginBase;

/**
 * popup Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Popup',
            'description' => 'An advanced popup manager',
            'author'      => 'ebussola',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     */
    public function registerNavigation()
    {
        return [
            'popup' => [
                'label'       => 'Popup',
                'url'         => \Backend::url('ebussola/popup/popups'),
                'icon'        => 'icon-pencil',
//                'permissions' => ['acme.blog.*'],
//                'order'       => 500,

                'sideMenu' => [
                    'popups' => [
                        'label'       => 'Popups',
                        'icon'        => 'icon-copy',
                        'url'         => \Backend::url('ebussola/popup/popups'),
//                        'permissions' => ['acme.blog.access_posts']
                    ],
                    'layouts' => [
                        'label'       => 'Layouts',
                        'icon'        => 'icon-copy',
                        'url'         => \Backend::url('ebussola/popup/layouts'),
//                        'permissions' => ['acme.blog.access_posts']
                    ]
                ]
            ]
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     */
    public function registerComponents()
    {
        return [
            '\Ebussola\Popup\Components\Popup' => 'popup'
        ];
    }

}
