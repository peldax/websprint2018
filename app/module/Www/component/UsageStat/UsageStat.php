<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

use App\Model\SubServiceModel;
use Nepttune\Component\BaseComponent;

final class UsageStat extends BaseComponent
{
    protected const ACTIVE_FILTER = true;

    /** @var SubServiceModel */
    protected $subServiceModel;

    public function __construct(SubServiceModel $subServiceModel)
    {
        parent::__construct();

        $this->subServiceModel = $subServiceModel;
    }
}
