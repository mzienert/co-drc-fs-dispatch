<?php
namespace App;

/**
 * PageContext Class
 * Holds all page-level data and metadata
 */
class PageContext {
    public $layoutData;
    public $layout;
    public $page_title;
    public $meta_description;
    public $body_class;
    public $canonical_url;
    public $og_title;
    public $og_description;
    public $og_url;
    public $og_type;
    public $og_site_name;
    public $og_image;
    public $content;

    public function __construct($layoutData) {
        $this->layoutData = $layoutData;
    }
}
?>
