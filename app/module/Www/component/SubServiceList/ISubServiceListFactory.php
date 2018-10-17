<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

interface ISubServiceListFactory
{
    public function create() : SubServiceList;
}
