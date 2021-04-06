<?php
/* NOTICE: Generated file; Do not edit by hand */
namespace VK\Elephize\src\__tests__\specimens\byType;
use VK\Elephize\Builtins\Stdlib;
use VK\Elephize\Builtins\CJSModule;

class ParameterDestructuringModule extends CJSModule {
    /**
     * @var ParameterDestructuringModule $_mod
     */
    private static $_mod;
    public static function getInstance(): ParameterDestructuringModule {
        if (!self::$_mod) {
            self::$_mod = new ParameterDestructuringModule();
        }
        return self::$_mod;
    }

    /**
     * @param mixed $anon_deref_1
     * @param mixed $anon_deref_2
     * @param boolean $param3
     * @return string
     */
    public function pdf1($anon_deref_1, $anon_deref_2, $param3) {
        $p1 = (float) $anon_deref_1["param1"];
        $p2 = (string) $anon_deref_1["param2"];
        $other = Stdlib::objectOmit($anon_deref_1, ["param1", "param2"]);
        $p3 = (float) $anon_deref_2["param1"];
        $p4 = (string) $anon_deref_2["param2"];
        return (string) $p1 .
            $p2 .
            (string) $other["param3"] .
            (string) $other["param4"] .
            (string) $param3 .
            (string) $p3 .
            $p4;
    }
    /**
     * @param mixed $anon_deref_1
     * @param mixed $anon_deref_2
     * @param boolean $param3
     * @return string
     */
    public function pdf2($anon_deref_1, $anon_deref_2, $param3) {
        $param1 = (float) $anon_deref_1[0];
        $param2 = (string) $anon_deref_1[1];
        $other = array_slice($anon_deref_1, 2);
        $param4 = (float) $anon_deref_2[0];
        $param5 = (string) $anon_deref_2[1];
        return (string) $param1 .
            $param2 .
            (string) $other[0] .
            (string) $other[1] .
            (string) $param3 .
            (string) $param4 .
            $param5;
    }

    private function __construct() {
        \VK\Elephize\Builtins\Console::log(
            $this->pdf1(
                [
                    "param1" => 1,
                    "param2" => "2",
                    "param3" => 3,
                    "param4" => 4,
                ],
                [
                    "param1" => 1,
                    "param2" => "2",
                ],
                false
            ),
            $this->pdf2([1, "2", 3, 4], [1, "2"], false)
        );
    }
}
