<?php
/* NOTICE: Generated file; Do not edit by hand */
namespace VK\Elephize\src\__tests__\specimens\fixes\CheckBox;
use VK\Elephize\Builtins\RenderableComponent;
use VK\Elephize\Builtins\IntrinsicElement;
use VK\Elephize\Builtins\Stdlib;

class CheckBox extends RenderableComponent {
    /**
     * @var CheckBox $_mod
     */
    private static $_mod;
    public static function getInstance(): CheckBox {
        if (!self::$_mod) {
            self::$_mod = new CheckBox();
        }
        return self::$_mod;
    }

    private function __construct() {
    }

    /**
     * @param array $props
     * @param array $children
     * @return string
     */
    public function render(array $props, array $children) {
        $checked = $props["checked"];
        $disabled = $props["disabled"];
        $name = $props["name"];
        $id = $props["id"];
        $native_props = Stdlib::objectOmit($props, ["children", "checked", "disabled", "indeterminate", "name", "id"]);
        return IntrinsicElement::get("label")->render(
            ["className" => "CheckBox--disabled"],
            [
                IntrinsicElement::get("input")->render(
                    array_merge($native_props, [
                        "className" => "CheckBox__input",
                        "id" => (string) $id,
                        "type" => "checkbox",
                        "checked" => !!$checked,
                        "name" => (string) $name,
                        "disabled" => $disabled,
                    ]),
                    []
                ),
                IntrinsicElement::get("span")->render(
                    ["className" => "CheckBox__indicator", "aria-hidden" => true],
                    []
                ),
                $children,
            ]
        );
    }
}
