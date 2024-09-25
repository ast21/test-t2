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
        $this->comment('Создаем ферму и добавляем животных: 10 коров и 20 кур.');
        $this->addAnimals($farm, Cow::class, 10);
        $this->addAnimals($farm, Chicken::class, 20);

        // Вывести на экран информацию о количестве каждого типа животных на ферме.
        $this->printAnimals($farm);

        // 7 раз (неделю) произвести сбор продукции (подоить коров и собрать яйца у кур).
        $this->harvest($farm);

        // Вывести на экран общее кол-во собранной за неделю продукции каждого типа.
        $this->printCollectedProducts($farm);

        // Добавить на ферму ещё 5 кур и 1 корову (съездили на рынок, купили животных).
        $this->newLine();
        $this->comment('На ферму привезли новых животных: 5 кур и 1 корову.');
        $this->addAnimals($farm, Cow::class, 1);
        $this->addAnimals($farm, Chicken::class, 5);

        // Снова вывести информацию о количестве каждого типа животных на ферме.
        $this->printAnimals($farm);

        // Снова 7 раз (неделю) производим сбор продукции.
        $this->harvest($farm);

        // И выводим результат на экран.
        $this->printCollectedProducts($farm);
    }

    private function harvest(Farm $farm): void
    {
        $this->newLine();
        $this->comment('Начинаем сбор продукции: прошло 7 дней...');
        for($i = 0; $i < 7; $i++) {
            $farm->harvest();
        }
    }

    private function printAnimals(Farm $farm): void
    {
        $this->newLine();
        $this->info("На ферме живут:");
        foreach ($farm->getAllAnimals() as $animal) {
            $this->info("$animal->name: $animal->count");
        }
    }

    private function addAnimals(Farm $farm, string $animal, int $count): void
    {
        for($i = 0; $i < $count; $i++) {
            $farm->addAnimal(new $animal());
        }
    }

    private function printCollectedProducts(Farm $farm): void
    {
        $this->newLine();
        $this->info('Собрано продукции:');
        foreach ($farm->getCollectedProducts() as $product) {
            $this->info("$product->name: $product->count $product->unitMeasure");
        }
    }
}
