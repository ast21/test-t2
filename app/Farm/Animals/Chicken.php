<?php

declare(strict_types=1);

namespace App\Farm\Animals;

use App\Farm\Abstracts\AbstractAnimal;
use App\Farm\Interfaces\AnimalInterface;
use App\Farm\Products\Egg;
use Illuminate\Support\Str;

class Chicken extends AbstractAnimal implements AnimalInterface
{
    public function __construct()
    {
        $this->regNumber = Str::uuid()->toString();
        $this->name = 'Курица';
        $this->product = app(Egg::class)
            ->setCountPeriod(0, 1);
    }
}