<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

use App\Model\ServiceModel;
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

    /** @var ServiceModel */
    protected $serviceModel;

    public function __construct(
        IserviceListFactory $IServiceListFactory,
        ISubServiceListFactory $ISubServiceListFactory,
        ServiceModel $serviceModel)
    {
        parent::__construct();

        $this->IServiceListFactory = $IServiceListFactory;
        $this->ISubServiceListFactory = $ISubServiceListFactory;
        $this->serviceModel = $serviceModel;
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
        $this->template->row = $this->serviceModel->findRow($id)->fetch();
    }
}

