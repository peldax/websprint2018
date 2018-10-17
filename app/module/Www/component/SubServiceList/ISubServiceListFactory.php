<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface ISubServiceListFactory
{
    public function create() : SubServiceList;
}
