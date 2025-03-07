<?php
declare(strict_types=1);

namespace Parrot;

final class EuropeanParrot extends Parrot
{
    public function __construct()
    {
    }

    public function getCry(): string
    {
        return 'Sqoork!';
    }

    public function getSpeed(): float
    {
        return self::BASE_SPEED;
    }
}
