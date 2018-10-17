<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface IEventListFactory
{
    public function create() : EventList;
}
