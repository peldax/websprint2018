<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

interface IEventListFactory
{
    public function create() : EventList;
}
