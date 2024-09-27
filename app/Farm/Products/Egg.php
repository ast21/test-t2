<?php

declare(strict_types=1);

namespace App\Farm\Products;

use App\Farm\Abstracts\AbstractProduct;
use App\Farm\Interfaces\ProductInterface;

class Egg extends AbstractProduct implements ProductInterface
{
    public function __construct()
    {
        $this->name = 'Яйцо';
        $this->unitMeasure = 'шт.';
    }
}