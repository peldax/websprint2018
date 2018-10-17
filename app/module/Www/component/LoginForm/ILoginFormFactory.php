<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

interface ILoginFormFactory
{
    public function create() : LoginForm;
}
