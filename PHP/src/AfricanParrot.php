<?php
declare(strict_types=1);

namespace Parrot;

final class AfricanParrot extends Parrot
{
    public function __construct(
        private int $numberOfCoconuts,
    ) {
    }

    public function getCry(): string
    {
        return 'Sqaark!';
    }

    public function getSpeed(): float
    {
        return max(0, self::BASE_SPEED - self::LOAD_FACTOR * $this->numberOfCoconuts);
    }
}
