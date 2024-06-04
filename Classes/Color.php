<?php

namespace Overload;

class Color
{
    public function __construct(private int $red, private int $green, private int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    static function random(): Color
    {
        return new Color(self::getRandomColor(), self::getRandomColor(), self::getRandomColor());
    }

    static function getRandomColor(): int
    {
        return rand(0, 255);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function setRed(int $red): void
    {
        try {
            $this->checkRangeNumber($red);
            $this->red = $red;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function setGreen(int $green): void
    {
        try {
            $this->checkRangeNumber($green);
            $this->green = $green;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    public function setBlue(int $blue): void
    {
        try {
            $this->checkRangeNumber($blue);
            $this->blue = $blue;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function equals(Color $color): bool
    {
        return $this->red === $color->red && $this->green === $color->green && $this->blue === $color->blue;
    }

    public function mix(Color $color): Color
    {
        return new Color(
            $this->getMixedColor($color->red, $this->getRed()),
            $this->getMixedColor($color->green, $this->getGreen()),
            $this->getMixedColor($color->blue, $this->getBlue()),
        );
    }

    private function checkRangeNumber(int $num): void
    {
        if ($num < 0 || $num > 255) {
            throw new Exception('Wrong number, it must be greater than or equal to 0 and less than or equal to 255.');
        }
    }

    private function getMixedColor(int $first_color, int $second_color): int
    {
        return ceil(($first_color + $second_color) / 2);
    }
}