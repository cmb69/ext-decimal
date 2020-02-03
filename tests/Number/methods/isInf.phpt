--TEST--
Number::isInf
--FILE--
<?php
require __DIR__ . "/../helpers/Number.php";

/**
 * op1, expected result
 */
$tests = [
    [ "1E-50",  false],
    ["-1E-50",  false],

    [0,         false],
    [1,         false],
    [2,         false],
    [3,         false],

    [-1,        false],
    [-2,        false],
    [-3,        false],

    ["1.5",     false],
    ["2.5",     false],
    ["3.5",     false],

    ["-INF",    true],
    [ "INF",    true],
    [ "NAN",    false],

    [-INF,      true],
    [ INF,      true],
    [ NAN,      false],
];

foreach ($tests as $test) {
    list($number, $expect) = $test;

    $result = Number::valueOf($number)->isInf();

    if ($result !== $expect) {
        print_r(compact("number", "result", "expect"));
    }
}
?>
--EXPECT--
