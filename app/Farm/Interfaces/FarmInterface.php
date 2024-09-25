<?php

declare(strict_types=1);

namespace App\Farm\Interfaces;

interface FarmInterface
{
    public function addAnimal(AnimalInterface $animal): static;

    public function getAnimals(): array;

    public function getProducts(): array;

    public function getCountProducts(): array;
}