<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface ILoginFormFactory
{
    public function create() : LoginForm;
}
