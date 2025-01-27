<?php
/* NOTICE: autogenerated file; Do not edit by hand */
namespace specimens\arrayMethods;
use VK\Elephize\Builtins\Stdlib;
use VK\Elephize\Builtins\CJSModule;

class SomeModule extends CJSModule {
    /**
     * @var SomeModule $_mod
     */
    private static $_mod;
    public static function getInstance(): SomeModule {
        if (!self::$_mod) {
            self::$_mod = new SomeModule();
        }
        return self::$_mod;
    }

    /**
     * @var float[] $asm
     */
    public $asm;
    /**
     * @var bool $bsm
     */
    public $bsm;
    /**
     * @var bool $csm
     */
    public $csm;

    private function __construct() {
        $this->asm = [1, 2, 3];
        $this->bsm = Stdlib::arraySome(
            $this->asm,
            /* anon_d473ed2 */ function ($val) {
                return $val > 1;
            }
        );
        $this->csm = Stdlib::arraySome(
            $this->asm,
            /* anon_5e02223 */ function ($val, $idx) {
                return ($val * $idx) % 2;
            }
        );
        \VK\Elephize\Builtins\Console::log($this->bsm, $this->csm);
    }
}
