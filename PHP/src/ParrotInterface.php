<?php
declare(strict_types=1);

namespace Parrot;

interface ParrotInterface
{
    public function getCry(): string;

    public function getSpeed(): float;
}
