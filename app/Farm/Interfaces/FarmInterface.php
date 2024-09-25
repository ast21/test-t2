<?php

declare(strict_types=1);

namespace App\Farm\Interfaces;

interface FarmInterface
{
    public function addAnimal(AnimalInterface $animal): static;

    public function getAllAnimals(): array;

    public function harvest(): void;

    public function getCollectedProducts(): array;
}