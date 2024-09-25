<?php

declare(strict_types=1);

namespace App\Farm\Interfaces;

interface ProductInterface
{
    public function setName(string $name): static;

    public function setCountPeriod(int $from, int $to): static;

    public function setUnitMeasure(string $unitMeasure): static;

    public function getName(): string;

    public function getCount(): int;

    public function getUnitMeasure(): string;
}