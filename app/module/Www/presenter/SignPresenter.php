<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

use App\AdminModule\Component\ILoginFormFactory;

final class SignPresenter extends \Nepttune\Presenter\SignPresenter
{
    /** @var ILoginFormFactory */
    protected $iClientLoginFormFactory;

    public function __construct(ILoginFormFactory $iClientLoginFormFactory, \Nepttune\Component\ILoginFormFactory $ILoginFormFactory)
    {
        parent::__construct($ILoginFormFactory);

        $this->iClientLoginFormFactory = $iClientLoginFormFactory;
    }

    protected function createComponentClientLoginForm() : \App\AdminModule\Component\LoginForm
    {
        return $this->iClientLoginFormFactory->create();
    }
}
