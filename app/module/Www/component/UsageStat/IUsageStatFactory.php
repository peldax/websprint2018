<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

interface IUsageStatFactory
{
    public function create() : UsageStat;
}
