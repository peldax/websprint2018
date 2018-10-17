<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface IEventFormFactory
{
    public function create() : EventForm;
}
