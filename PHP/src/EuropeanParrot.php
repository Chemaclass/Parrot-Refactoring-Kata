<?php
declare(strict_types=1);

namespace Parrot;

final class EuropeanParrot extends Parrot
{
    public function __construct()
    {
        parent::__construct(ParrotTypeEnum::EUROPEAN, -1, -1, false);
    }

    public function getSpeed(): float
    {
        return self::BASE_SPEED;
    }
}
