<?php

declare(strict_types=1);

namespace App\Farm\Data;

class AnimalData
{
    public function __construct(
        public string $name,
        public int $count,
    ) {
    }
}