<?php
/* NOTICE: Generated file; Do not edit by hand */
namespace VK\Elephize\src\__tests__\specimens\misc;
use VK\Elephize\Builtins\Stdlib;
use VK\Elephize\Builtins\CJSModule;

class DefaultValuesModule extends CJSModule {
    /**
     * @var DefaultValuesModule $_mod
     */
    private static $_mod;
    public static function getInstance(): DefaultValuesModule {
        if (!self::$_mod) {
            self::$_mod = new DefaultValuesModule();
        }
        return self::$_mod;
    }

    /**
     * @param float $a
     * @param ?float $b
     * @param ?boolean $c
     * @return mixed
     */
    public function dvf($a, $b, $c) {
        $b = $b ?? 123;
        $c = $c ?? true;
        \VK\Elephize\Builtins\Console::log($a, $b, $c);
    }
    /**
     * @param mixed $anon_deref_1
     * @return mixed
     */
    public function dvdo($anon_deref_1) {
        $a = (float) $anon_deref_1["a"];
        $b = (float) $anon_deref_1["b"] ?? 123;
        $c = (bool) $anon_deref_1["c"] ?? true;
        \VK\Elephize\Builtins\Console::log($a, $b, $c);
    }
    /**
     * @param mixed $anon_deref_1
     * @return mixed
     */
    public function dvda($anon_deref_1) {
        $a = (float) $anon_deref_1[0];
        $b = (float) $anon_deref_1[1] ?? 123;
        $c = (bool) $anon_deref_1[2] ?? true;
        \VK\Elephize\Builtins\Console::log($a, $b, $c);
    }

    private function __construct() {
        \VK\Elephize\Builtins\Console::log($this->dvf(1));
        \VK\Elephize\Builtins\Console::log(
            $this->dvdo([
                "a" => 1,
            ])
        );
        \VK\Elephize\Builtins\Console::log($this->dvda([1]));
    }
}
