<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface IServiceListFactory
{
    public function create() : ServiceList;
}
