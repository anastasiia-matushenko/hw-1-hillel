<?php
require_once './classes/Color.php';


$random = Color::random();
echo "{$random->getRed()}-{$random->getGreen()}-{$random->getBlue()}\n";

$color = new Color(250, 250, 250);
$mixedColor = $color->mix(new Color(100, 100, 100));
echo "{$mixedColor->getRed()}-{$mixedColor->getGreen()}-{$mixedColor->getBlue()}";

