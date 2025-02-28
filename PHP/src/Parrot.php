<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

abstract class Parrot implements ParrotInterface
{
    const float BASE_SPEED = 12.0;
    const float LOAD_FACTOR = 9.0;

    /**
     * @throws Exception
     */
    public static function create(int $type, int $numberOfCoconuts, float $voltage, bool $isNailed): self
    {
        return match ($type) {
            ParrotTypeEnum::EUROPEAN => new EuropeanParrot(),
            ParrotTypeEnum::AFRICAN => new AfricanParrot($numberOfCoconuts),
            ParrotTypeEnum::NORWEGIAN_BLUE => new NorwegianBlueParrot($voltage, $isNailed),
            default => throw new Exception('Should be unreachable'),
        };
    }

    abstract public function getSpeed(): float;

    abstract public function getCry(): string;
}
