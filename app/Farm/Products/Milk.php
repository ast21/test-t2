<?php

declare(strict_types=1);

namespace App\Farm\Products;

use App\Farm\Abstracts\AbstractProduct;
use App\Farm\Interfaces\ProductInterface;

class Milk extends AbstractProduct implements ProductInterface
{
    public function __construct()
    {
        $this->name = 'Молоко';
        $this->unitMeasure = 'л.';
    }
}