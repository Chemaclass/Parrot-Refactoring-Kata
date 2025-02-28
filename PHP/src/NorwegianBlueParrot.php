<?php
declare(strict_types=1);

namespace Parrot;

final class NorwegianBlueParrot extends Parrot
{
    public function __construct(
        private float $voltage,
        private bool $isNailed,
    ) {
    }

    public function getCry(): string
    {
        return $this->voltage > 0
            ? 'Bzzzzzz'
            : '...';
    }

    public function getSpeed(): float
    {
        return !$this->isNailed
            ? min(24.0, $this->voltage * self::BASE_SPEED)
            : 0;
    }
}
