<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

use App\WwwModule\Component\IServiceListFactory;
use App\WwwModule\Component\ISubServiceListFactory;
use App\WwwModule\Component\ServiceList;
use App\WwwModule\Component\SubServiceList;
use Nepttune\Presenter\BaseAuthPresenter;

final class ServicePresenter extends BaseAuthPresenter
{
    /** @var IServiceListFactory */
    protected $IServiceListFactory;

    /** @var ISubServiceListFactory */
    protected $ISubServiceListFactory;

    public function __construct(
        IserviceListFactory $IServiceListFactory,
        ISubServiceListFactory $ISubServiceListFactory)
    {
        parent::__construct();

        $this->IServiceListFactory = $IServiceListFactory;
        $this->ISubServiceListFactory = $ISubServiceListFactory;
    }

    protected function createComponentServiceList() : ServiceList
    {
        return $this->IServiceListFactory->create();
    }

    protected function createComponentSubServiceList() : SubServiceList
    {
        $control = $this->ISubServiceListFactory->create();
        $control->setId($this->getId());
        return $control;
    }

    /**
     * @restricted
     * @root
     */
    public function actionDefault() : void
    {

    }

    /**
     * @restricted
     * @root
     */
    public function actionSub(int $id) : void
    {

    }
}

