<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

interface IRoomListFactory
{
    public function create() : RoomList;
}
