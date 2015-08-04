<?php namespace Ebussola\Popup\Classes;

use Cms\Classes\CmsController;
use Cms\Classes\CodeParser;
use Cms\Classes\Controller;
use Cms\Classes\Layout;
use Cms\Classes\MediaLibrary;
use Cms\Classes\Page;
use Cms\Classes\Theme;
use Ebussola\Popup\Models\Popup;
use System\Models\File;

/**
 * Created by PhpStorm.
 * User: shina
 * Date: 8/3/15
 * Time: 8:49 PM
 */
class PopupHelper
{

    /**
     * @var Popup
     */
    protected $popup;

    /**
     * PopupHelper constructor.
     * @param Popup $popup
     */
    public function __construct(Popup $popup)
    {
        $this->popup = $popup;
    }

    /**
     * @param Popup $popup
     * @return static
     */
    public static function instance(Popup $popup)
    {
        return new static($popup);
    }

    /**
     * @return bool|string
     * @throws \SystemException
     */
    public function getContent()
    {
        switch ($this->popup->content_type) {
            case 'imageUrl' :
                return "<img src='{$this->popup->content_image_url}'>";
                break;

            case 'imageUpload' :
                return '<img src="' . MediaLibrary::instance()->getPathUrl($this->popup->content_image_upload) . '">';
                break;

            case 'page' :
                /** @var Page $page */
                $page = Page::load(Theme::getActiveTheme(), $this->popup->content_page);
                $cms = new CmsController();

                return $cms->run($page->url)->getContent();
                break;

            case 'markdown' :
                return \Markdown::parse($this->popup->content_markdown);
                break;
        }
    }

}