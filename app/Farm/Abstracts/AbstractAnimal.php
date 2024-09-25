<?php

declare(strict_types=1);

namespace App\Farm\Abstracts;

use App\Farm\Interfaces\AnimalInterface;
use App\Farm\Interfaces\ProductInterface;
use Illuminate\Support\Str;

abstract class AbstractAnimal implements AnimalInterface
{
    protected string $regNumber;
    protected string $name;
    protected ProductInterface $product;

    public function setRegNumber(?string $regNumber): static
    {
        $this->regNumber = $regNumber ?? Str::uuid();

        return $this;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function setProduct(ProductInterface $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getRegNumber(): string
    {
        return $this->regNumber;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getProduct(): ProductInterface
    {
        return $this->product;
    }
}