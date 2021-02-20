<?php
/* NOTICE: Generated file; Do not edit by hand */
namespace VK\Elephize\src\__tests__\specimens\functionMethods;
use VK\Elephize\Builtins\Stdlib;
use VK\Elephize\Builtins\CJSModule;

class ClosuresModule extends CJSModule {
    /**
     * @var ClosuresModule $_mod
     */
    private static $_mod;
    public static function getInstance(): ClosuresModule {
        if (!self::$_mod) {
            self::$_mod = new ClosuresModule();
        }
        return self::$_mod;
    }

    /**
     * @param float $b
     * @return float
     */
    public function artest($b) {
        $called_times = 0;
        $nested = /* nested */ function ($c) use (/* !! MODIFIED INSIDE !! */ $called_times) {
            $called_times += $c;
            return $called_times;
        };
        $nested2 = /* nested2 */ function ($c) use ($called_times) {
            return $called_times + $c;
        };
        return $nested($b) + $nested2($b);
    }

    private function __construct() {
        \VK\Elephize\Builtins\Console::log($this->artest(1));
    }
}
