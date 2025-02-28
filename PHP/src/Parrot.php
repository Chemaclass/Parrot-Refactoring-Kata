<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

class Parrot
{
    const float BASE_SPEED = 12.0;
    const float LOAD_FACTOR = 9.0;

    public function __construct(
        /**
         * @var int ParrotTypeEnum
         */
        private int $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {
    }

    /**
     * @throws Exception
     */
    public static function create(int $type, int $numberOfCoconuts, float $voltage, bool $isNailed): self
    {
        return match ($type) {
            ParrotTypeEnum::EUROPEAN => new EuropeanParrot(),
            ParrotTypeEnum::AFRICAN => self::createAfricanParrot($numberOfCoconuts),
            ParrotTypeEnum::NORWEGIAN_BLUE => self::createNorwegianBlueParrot($voltage, $isNailed),
            default => throw new Exception('Should be unreachable'),
        };
    }

    public static function createAfricanParrot(int $numberOfCoconuts): self
    {
        return new self(ParrotTypeEnum::AFRICAN, $numberOfCoconuts, -1, false);
    }

    public static function createNorwegianBlueParrot(float $voltage, bool $isNailed): self
    {
        return new self(ParrotTypeEnum::NORWEGIAN_BLUE, -1, $voltage, $isNailed);
    }

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN => self::BASE_SPEED,
            ParrotTypeEnum::AFRICAN => max(0, self::BASE_SPEED - self::LOAD_FACTOR * $this->numberOfCoconuts),
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage),
            default => throw new Exception('Should be unreachable'),
        };
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN => 'Sqoork!',
            ParrotTypeEnum::AFRICAN => 'Sqaark!',
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->voltage > 0 ? 'Bzzzzzz' : '...',
            default => throw new Exception('Should be unreachable'),
        };
    }

    private function getBaseSpeedWith(float $voltage): float
    {
        return min(24.0, $voltage * self::BASE_SPEED);
    }

}
