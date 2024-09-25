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
        for($i = 0; $i < 10; $i++) {
            $farm->addAnimal(new Cow());
        }
        for($i = 0; $i < 20; $i++) {
            $farm->addAnimal(new Chicken());
        }

        // Вывести на экран информацию о количестве каждого типа животных на ферме.
        $this->info('На ферме живут:');
        foreach ($farm->getCountAnimals() as $name => $count) {
            $this->info("$name: $count");
        }

        // 7 раз (неделю) произвести сбор продукции (подоить коров и собрать яйца у кур).
        // Вывести на экран общее кол-во собранной за неделю продукции каждого типа.
        // Добавить на ферму ещё 5 кур и 1 корову (съездили на рынок, купили животных).
        // Снова вывести информацию о количестве каждого типа животных на ферме.
        // Снова 7 раз (неделю) производим сбор продукции и выводим результат на экран.
    }
}
