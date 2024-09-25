<?php

declare(strict_types=1);

namespace App\Farm\Interfaces;

interface FarmInterface
{
    public function addAnimal(AnimalInterface $animal): static;

    public function getCountAnimals(): array;

    public function getProducts(): array;

    public function getCountProducts(): array;
}