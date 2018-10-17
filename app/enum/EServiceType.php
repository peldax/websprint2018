<?php

declare(strict_types = 1);

namespace App\Enum;

final class EServiceType
{
    public const ENUM = ['singleuse' => 'Okamžitá', 'timeduse' => 'Časovaná', 'uniquetimeduse' => 'Rezervovaná'];
}
