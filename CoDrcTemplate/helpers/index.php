<?php
/**
 * Global Helpers Class
 */

class Helpers {
    private static $instance = null;

    private function __construct() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function renderDropdown($children) {
        $html = '<ul class="nav-dropdown">';
        foreach ($children as $child) {
            $html .= '<li class="nav-dropdown-item">';
            $html .= '<a href="' . htmlspecialchars($child['url']) . '" class="nav-dropdown-link">' . htmlspecialchars($child['label']) . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}
