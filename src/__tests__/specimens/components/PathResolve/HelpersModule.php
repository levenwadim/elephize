<?php
/* NOTICE: autogenerated file; Do not edit by hand */
namespace specimens\components\PathResolve;
use VK\Elephize\Builtins\Stdlib;
use VK\Elephize\Builtins\CJSModule;

class HelpersModule extends CJSModule {
    /**
     * @var HelpersModule $_mod
     */
    private static $_mod;
    public static function getInstance(): HelpersModule {
        if (!self::$_mod) {
            self::$_mod = new HelpersModule();
        }
        return self::$_mod;
    }

    /**
     * @var string $SOME_CONST
     */
    public $SOME_CONST;
    /**
     * @return string
     */
    public function getFoo2() {
        return "foo2";
    }
    /**
     * @return string
     */
    public function getFoo() {
        return "foo";
    }

    private function __construct() {
        $this->SOME_CONST = "buzz";
    }
}
