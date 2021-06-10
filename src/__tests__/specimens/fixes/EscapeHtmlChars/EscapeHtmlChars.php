<?php
/* NOTICE: autogenerated file; Do not edit by hand */
namespace specimens\fixes\EscapeHtmlChars;
use VK\Elephize\Builtins\RenderableComponent;
use VK\Elephize\Builtins\Stdlib;

class EscapeHtmlChars extends RenderableComponent {
    /**
     * @var EscapeHtmlChars $_mod
     */
    private static $_mod;
    public static function getInstance(): EscapeHtmlChars {
        if (!self::$_mod) {
            self::$_mod = new EscapeHtmlChars();
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
        $arr = [1, 2, 3, 4];
        return \VK\Elephize\Builtins\IntrinsicElement::get("div")->render(
            ["className" => "App"],
            [
                \VK\Elephize\Builtins\IntrinsicElement::get("h1")->render([], ["Hello CodeSandbox"]),
                \VK\Elephize\Builtins\IntrinsicElement::get("h2")->render(
                    [],
                    ["Start editing to see some magic happen!"]
                ),
                Stdlib::arrayMap1(
                    $arr,
                    /* anon_7c61e81 */ function ($v) {
                        return \VK\Elephize\Builtins\IntrinsicElement::get("span")->render(
                            [],
                            [
                                \VK\Elephize\Builtins\IntrinsicElement::escape(
                                    \specimens\fixes\EscapeHtmlCharsModule::getInstance()->injection
                                ),
                                $v,
                            ]
                        );
                    }
                ),
                \VK\Elephize\Builtins\IntrinsicElement::escape(
                    \specimens\fixes\EscapeHtmlCharsModule::getInstance()->armenian
                ),
                \VK\Elephize\Builtins\IntrinsicElement::escape(
                    \specimens\fixes\EscapeHtmlCharsModule::getInstance()->injection
                ),
                \VK\Elephize\Builtins\IntrinsicElement::get("br")->render([], []),
                " Ձեր ",
                \VK\Elephize\Builtins\IntrinsicElement::get("br")->render([], []),
                \VK\Elephize\Builtins\IntrinsicElement::get("input")->render(["placeholder" => "Ձեր"], []),
                \VK\Elephize\Builtins\IntrinsicElement::get("input")->render(["placeholder" => "&quot;Ձեր&quot;"], []),
                \VK\Elephize\Builtins\IntrinsicElement::get("input")->render(
                    ["placeholder" => \VK\Elephize\Builtins\IntrinsicElement::escape("\"&#1345;&#1381;&#1408;\"")],
                    []
                ),
                \VK\Elephize\Builtins\IntrinsicElement::get("br")->render([], []),
                \VK\Elephize\Builtins\IntrinsicElement::get("input")->render(
                    [
                        "placeholder" => \VK\Elephize\Builtins\IntrinsicElement::escape(
                            \specimens\fixes\EscapeHtmlCharsModule::getInstance()->armenian
                        ),
                    ],
                    []
                ),
                \VK\Elephize\Builtins\IntrinsicElement::get("br")->render([], []),
                $children,
                \specimens\fixes\EscapeHtmlChars\NestedEscapeHtmlChars::getInstance()->render(
                    ["title" => \specimens\fixes\EscapeHtmlCharsModule::getInstance()->injection],
                    []
                ),
                \specimens\fixes\EscapeHtmlChars\NestedEscapeHtmlChars::getInstance()->render(
                    ["title" => \specimens\fixes\EscapeHtmlCharsModule::getInstance()->armenian],
                    []
                ),
            ]
        );
    }
}
