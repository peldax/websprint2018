<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

use Nepttune\Presenter\BaseAuthPresenter;

final class DefaultPresenter extends BaseAuthPresenter
{
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
}
