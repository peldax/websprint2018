<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

interface IServiceListFactory
{
    public function create() : ServiceList;
}
