<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface IUserFormFactory
{
    public function create() : UserForm;
}
