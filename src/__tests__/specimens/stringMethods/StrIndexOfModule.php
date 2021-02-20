<?php
/* NOTICE: Generated file; Do not edit by hand */
namespace VK\Elephize\src\__tests__\specimens\stringMethods;
use VK\Elephize\Builtins\Stdlib;
use VK\Elephize\Builtins\CJSModule;

class StrIndexOfModule extends CJSModule {
    /**
     * @var StrIndexOfModule $_mod
     */
    private static $_mod;
    public static function getInstance(): StrIndexOfModule {
        if (!self::$_mod) {
            self::$_mod = new StrIndexOfModule();
        }
        return self::$_mod;
    }

    /**
     * @var string $aios
     */
    public $aios;
    /**
     * @var float $bios
     */
    public $bios;
    /**
     * @var float $cios
     */
    public $cios;
    /**
     * @var float $dios
     */
    public $dios;

    private function __construct() {
        $this->aios = "12345";
        $this->bios = strpos($this->aios, "2");
        $this->cios = strpos($this->aios, "2", 2);
        $this->dios = strrpos($this->aios, "2", -2);
        \VK\Elephize\Builtins\Console::log($this->bios, $this->cios, $this->dios);
    }
}
