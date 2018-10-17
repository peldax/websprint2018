<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

use App\AdminModule\Component\EventList;
use App\AdminModule\Component\EventForm;
use App\AdminModule\Component\IEventListFactory;
use App\AdminModule\Component\IEventFormFactory;
use Nepttune\Presenter\BaseAuthPresenter;

final class DefaultPresenter extends BaseAuthPresenter
{
    /** @var IEventListFactory */
    protected $iEventListFactory;

    /** @var IEventFormFactory */
    protected $iEventFormFactory;

    public function __construct(IEventListFactory $IEventListFactory, IEventFormFactory $IEventFormFactory)
    {
        parent::__construct();

        $this->iEventListFactory = $IEventListFactory;
        $this->iEventFormFactory = $IEventFormFactory;
    }

    public function actionDefault() : void
    {
        if ($this->user->isInRole('room'))
        {
            $this->template->setFile(__DIR__ . '/../templates/Default/customer.latte');
        }
        else
        {
            $this->template->setFile(__DIR__ . '/../templates/Default/admin.latte');
        }
    }

    protected function createComponentEventList() : EventList
    {
        return $this->iEventListFactory->create();
    }

    protected function createComponentEventForm() : EventForm
    {
        return $this->iEventFormFactory->create();
    }
}
