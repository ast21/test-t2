<?php

declare(strict_types=1);

namespace App\Farm;

use App\Farm\Abstracts\AbstractAnimal;
use App\Farm\Interfaces\AnimalInterface;
use Illuminate\Support\Str;

class Chicken extends AbstractAnimal implements AnimalInterface
{
    public function __construct()
    {
        $this->regNumber = Str::uuid()->toString();
        $this->name = 'Курица';
        $this->product = app(Product::class)
            ->setName('Яйцо')
            ->setCountPeriod(0, 1)
            ->setUnitMeasure('шт.');
    }
}