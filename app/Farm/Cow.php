<?php

declare(strict_types=1);

namespace App\Farm;

use App\Farm\Abstracts\AbstractAnimal;
use App\Farm\Interfaces\AnimalInterface;
use Illuminate\Support\Str;

class Cow extends AbstractAnimal implements AnimalInterface
{
    public function __construct()
    {
        $this->regNumber = Str::uuid()->toString();
        $this->name = 'Корова';
        $this->product = app(Product::class)
            ->setName('Молоко')
            ->setCountPeriod(8, 12)
            ->setUnitMeasure('л.');
    }
}