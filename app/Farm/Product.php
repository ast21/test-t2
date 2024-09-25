<?php

declare(strict_types=1);

namespace App\Farm;

use App\Farm\Interfaces\ProductInterface;

class Product implements ProductInterface
{
    protected string $name;
    protected int $countFrom;
    protected int $countTo;
    protected string $unitMeasure;

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function setCountPeriod(int $from, int $to): static
    {
        $this->countFrom = $from;
        $this->countTo = $to;

        return $this;
    }

    public function setUnitMeasure(string $unitMeasure): static
    {
        $this->unitMeasure = $unitMeasure;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCount(): int
    {
        return rand($this->countFrom, $this->countTo);
    }

    public function getUnitMeasure(): string
    {
        return $this->unitMeasure;
    }
}