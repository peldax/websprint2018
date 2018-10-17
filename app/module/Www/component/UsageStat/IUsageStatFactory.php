<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface IUsageStatFactory
{
    public function create() : UsageStat;
}
