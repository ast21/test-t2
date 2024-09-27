<?php

declare(strict_types=1);

namespace App\Farm\Animals;

use App\Farm\Abstracts\AbstractAnimal;
use App\Farm\Interfaces\AnimalInterface;
use App\Farm\Products\Milk;
use Illuminate\Support\Str;

class Goat extends AbstractAnimal implements AnimalInterface
{
    public function __construct()
    {
        $this->regNumber = Str::uuid()->toString();
        $this->name = 'Коза';
        $this->product = app(Milk::class)
            ->setCountPeriod(3, 5);
    }
}