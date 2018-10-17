<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface IUserListFactory
{
    public function create() : UserList;
}
