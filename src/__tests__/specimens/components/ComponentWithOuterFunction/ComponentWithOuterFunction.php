<?php
/* NOTICE: autogenerated file; Do not edit by hand */
namespace specimens\components\ComponentWithOuterFunction;
use VK\Elephize\Builtins\RenderableComponent;
use VK\Elephize\Builtins\Stdlib;

class ComponentWithOuterFunction extends RenderableComponent {
    /**
     * @var ComponentWithOuterFunction $_mod
     */
    private static $_mod;
    public static function getInstance(): ComponentWithOuterFunction {
        if (!self::$_mod) {
            self::$_mod = new ComponentWithOuterFunction();
        }
        return self::$_mod;
    }

    private function __construct() {
    }

    /**
     * @param mixed[] $props
     * @param mixed[] $children
     * @return ?string
     */
    public function render(array $props, array $children) {
        $classes = (string) $props["classes"];
        return \VK\Elephize\Builtins\IntrinsicElement::get("div")->render(
            [
                "className" => \specimens\components\ComponentWithOuterFunctionModule::getInstance()->prepareClasses(
                    \specimens\components\ComponentWithOuterFunctionModule::getInstance()->morePrepare($classes)
                ),
            ],
            [$children]
        );
    }
}
