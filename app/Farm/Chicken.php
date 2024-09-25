<?php

declare(strict_types=1);

namespace App\Farm;

use App\Farm\Abstracts\AbstractAnimal;
use App\Farm\Interfaces\AnimalInterface;

class Chicken extends AbstractAnimal implements AnimalInterface
{
    public function __construct()
    {
        $this->name = 'Курица';
        $this->product = app(Product::class)
            ->setName('Яйцо')
            ->setCountPeriod(0, 1)
            ->setUnitMeasure('шт');
    }
}