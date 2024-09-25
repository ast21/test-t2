<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FarmLife extends Command
{
    protected $signature = 'farm:life';

    protected $description = 'Симулятор деревенской жизни на ООП';

    public function handle()
    {
        $this->info('Добро пожаловать в симулятор деревенской жизни!');
    }
}
