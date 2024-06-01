<?php
require_once __DIR__ . '/vendor/autoload.php';

use Exceptions\InvalidMethodCallException;
use Overload\ {
    Color,
    User
};



$random = Color::random();
echo "{$random->getRed()}-{$random->getGreen()}-{$random->getBlue()}\n";

//$color = new Color(250, 250, 250);
//$mixedColor = $color->mix(new Color(100, 100, 100));
//echo "{$mixedColor->getRed()}-{$mixedColor->getGreen()}-{$mixedColor->getBlue()}";

try {
    $test = new User('Frank', 78, 'email');
    $test->setAge(24);
    echo implode(', ', $test->getAll());
    $test->setStatus();
} catch (Exception $e) {
    if ($e instanceof InvalidMethodCallException) {
        echo $e->getMessage();
    }
}
