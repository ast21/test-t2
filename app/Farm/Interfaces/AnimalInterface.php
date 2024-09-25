<?php

declare(strict_types=1);

namespace App\Farm\Interfaces;

interface AnimalInterface
{
    public function setRegNumber(?string $regNumber): static;

    public function setName(string $name): static;

    public function setProduct(ProductInterface $product): static;

    public function getRegNumber(): string;

    public function getName(): string;

    public function getProduct(): ProductInterface;
}