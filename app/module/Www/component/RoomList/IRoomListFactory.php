<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

interface IRoomListFactory
{
    public function create() : RoomList;
}
