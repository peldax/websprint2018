<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

final class SignPresenter extends \Nepttune\Presenter\SignPresenter
{
    protected function createComponentLoginForm() : App\AdminModule\Component\LoginForm
    {
        $control = $this->iLoginFormFactory->create();
        $control->setRedirect($this->dest['adminHomepage']);
        return $control;
    }
}
