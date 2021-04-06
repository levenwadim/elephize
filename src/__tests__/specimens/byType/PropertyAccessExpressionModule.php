<?php
/* NOTICE: Generated file; Do not edit by hand */
namespace VK\Elephize\src\__tests__\specimens\byType;
use VK\Elephize\Builtins\Stdlib;
use VK\Elephize\Builtins\CJSModule;

class PropertyAccessExpressionModule extends CJSModule {
    /**
     * @var PropertyAccessExpressionModule $_mod
     */
    private static $_mod;
    public static function getInstance(): PropertyAccessExpressionModule {
        if (!self::$_mod) {
            self::$_mod = new PropertyAccessExpressionModule();
        }
        return self::$_mod;
    }

    /**
     * @var array $b1
     */
    public $b1;
    /**
     * @var float $d1
     */
    public $d1;
    /**
     * @var float $d2
     */
    public $d2;
    /**
     * @var array $d3
     */
    public $d3;
    /**
     * @var string $d4
     */
    public $d4;
    /**
     * @var array $d5
     */
    public $d5;
    /**
     * @var float $d6
     */
    public $d6;
    /**
     * @var string $d7
     */
    public $d7;
    /**
     * @var float $d8
     */
    public $d8;

    private function __construct() {
        $this->b1 = [
            "a" => 1,
            "b" => 2,
        ];
        $this->d1 = $this->b1["a"];
        $this->d2 = $this->b1["b"];
        $this->d3 = [
            "a" => [
                "b" => [
                    "c" => 1,
                ],
            ],
        ];
        $this->d4 = (string) $this->d3["a"]["b"]["c"];
        $this->d5 = [
            "a" => [
                "b" => [
                    "c" => [
                        "d" => [
                            "e" => 2,
                            "f" => /* anon_10a1a4c */ function () {
                                return 1;
                            },
                        ],
                    ],
                ],
            ],
        ];
        $this->d6 = isset($this->d5["a"]["b"]["c"]["d"]["e"]) ? $this->d5["a"]["b"]["c"]["d"]["e"] : null;
        $this->d7 = isset($this->d5["a"]["b"]["c"]["d"]["e"]) ? (string) $this->d5["a"]["b"]["c"]["d"]["e"] : null;
        $this->d8 = isset($this->d5["a"]["b"]["c"]["d"]) ? $this->d5["a"]["b"]["c"]["d"]["f"]() : null;
        \VK\Elephize\Builtins\Console::log($this->d1, $this->d2, $this->d4, $this->d6, $this->d7, $this->d8);
    }
}
