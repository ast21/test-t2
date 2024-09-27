<?php

declare(strict_types=1);

namespace App\Farm\Animals;

use App\Farm\Abstracts\AbstractAnimal;
use App\Farm\Interfaces\AnimalInterface;
use App\Farm\Products\Milk;
use Illuminate\Support\Str;

class Cow extends AbstractAnimal implements AnimalInterface
{
    public function __construct()
    {
        $this->regNumber = Str::uuid()->toString();
        $this->name = 'Корова';
        $this->product = app(Milk::class)
            ->setCountPeriod(8, 12);
    }
}