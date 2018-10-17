<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

interface IEventFormFactory
{
    public function create() : EventForm;
}
