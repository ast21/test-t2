<?php

namespace App\Console\Commands;

use App\Farm\Chicken;
use App\Farm\Cow;
use App\Farm\Farm;
use Illuminate\Console\Command;

class FarmLife extends Command
{
    protected $signature = 'farm:life';

    protected $description = 'Симулятор деревенской жизни на ООП';

    public function handle(Farm $farm)
    {
        $this->info('Добро пожаловать в симулятор деревенской жизни!');

        // Система должна добавить животных в хлев (10 коров и 20 кур).
        $this->newLine();
        $this->info('Создаем ферму и добавляем животных: 10 коров и 20 кур.');
        for($i = 0; $i < 10; $i++) {
            $farm->addAnimal(new Cow());
        }
        for($i = 0; $i < 20; $i++) {
            $farm->addAnimal(new Chicken());
        }

        // Вывести на экран информацию о количестве каждого типа животных на ферме.
        $this->newLine();
        $this->info("На ферме живут:");
        foreach ($farm->getAllAnimals() as $animal) {
            $this->info("$animal->name: $animal->count");
        }

        // 7 раз (неделю) произвести сбор продукции (подоить коров и собрать яйца у кур).
        $this->newLine();
        $this->info('Начинаем сбор продукции: прошло 7 дней...');
        for($i = 0; $i < 7; $i++) {
            $farm->harvest();
        }

        // Вывести на экран общее кол-во собранной за неделю продукции каждого типа.
        $this->newLine();
        $this->info('Собрано продукции:');
        foreach ($farm->getCollectedProducts() as $product) {
            $this->info("$product->name: $product->count $product->unitMeasure");
        }

        // Добавить на ферму ещё 5 кур и 1 корову (съездили на рынок, купили животных).
        $this->newLine();
        $this->info('На ферму привезли новых животных: 5 кур и 1 корову.');
        for($i = 0; $i < 5; $i++) {
            $farm->addAnimal(new Chicken());
        }
        $farm->addAnimal(new Cow());

        // Снова вывести информацию о количестве каждого типа животных на ферме.
        $this->newLine();
        $this->info("На ферме живут:");
        foreach ($farm->getAllAnimals() as $animal) {
            $this->info("$animal->name: $animal->count");
        }

        // Снова 7 раз (неделю) производим сбор продукции.
        $this->newLine();
        $this->info('Начинаем сбор продукции: прошло 7 дней...');
        for($i = 0; $i < 7; $i++) {
            $farm->harvest();
        }

        // И выводим результат на экран.
        $this->newLine();
        $this->info('Собрано продукции:');
        foreach ($farm->getCollectedProducts() as $product) {
            $this->info("$product->name: $product->count $product->unitMeasure");
        }
    }
}
