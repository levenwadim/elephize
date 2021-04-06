<?php
/* NOTICE: Generated file; Do not edit by hand */
namespace VK\Elephize\src\__tests__\specimens\components\NestedComponent;
use VK\Elephize\Builtins\RenderableComponent;
use VK\Elephize\Builtins\Stdlib;

require_once __DIR__ . '/../DummyComponent/DummyComponent.php';

class NestedComponent extends RenderableComponent {
    /**
     * @var NestedComponent $_mod
     */
    private static $_mod;
    public static function getInstance(): NestedComponent {
        if (!self::$_mod) {
            self::$_mod = new NestedComponent();
        }
        return self::$_mod;
    }

    private function __construct() {
    }

    /**
     * @param array $props
     * @param array $children
     * @return ?string
     */
    public function render(array $props, array $children) {
        $anon_3b2ed12 = [0];
        $count = (float) $anon_3b2ed12[0];
        $arr = [1, 2, 3];
        return \VK\Elephize\Builtins\IntrinsicElement::get("div")->render(
            [],
            [
                \VK\Elephize\src\__tests__\specimens\components\DummyComponent\DummyComponent::getInstance()->render(
                    ["count" => $count],
                    []
                ),
                Stdlib::arrayMap1(
                    $arr,
                    /* anon_b4f3ee1 */ function ($val) use ($count) {
                        return \VK\Elephize\src\__tests__\specimens\components\DummyComponent\DummyComponent::getInstance()->render(
                            ["key" => $val, "count" => $count],
                            []
                        );
                    }
                ),
            ]
        );
    }
}
