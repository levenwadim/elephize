<?php
/* NOTICE: autogenerated file; Do not edit by hand */
namespace specimens\fixes\EscapeHtmlChars;
use VK\Elephize\Builtins\RenderableComponent;
use VK\Elephize\Builtins\Stdlib;

class NestedEscapeHtmlChars extends RenderableComponent {
    /**
     * @var NestedEscapeHtmlChars $_mod
     */
    private static $_mod;
    public static function getInstance(): NestedEscapeHtmlChars {
        if (!self::$_mod) {
            self::$_mod = new NestedEscapeHtmlChars();
        }
        return self::$_mod;
    }

    private function __construct() {
    }

    /**
     * @param mixed[] $anon_deref_1
     * @param mixed[] $children
     * @return ?string
     */
    public function render(array $anon_deref_1, array $children) {
        $title = (string) $anon_deref_1["title"];
        return \VK\Elephize\Builtins\IntrinsicElement::get("span")->render(
            [],
            [\VK\Elephize\Builtins\IntrinsicElement::escape($title)]
        );
    }
}
