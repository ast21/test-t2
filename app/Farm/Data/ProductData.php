<?php

declare(strict_types=1);

namespace App\Farm\Data;

class ProductData
{
    public function __construct(
        public string $name,
        public int $count,
        public string $unitMeasure,
    ) {
    }
}