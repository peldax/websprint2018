<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

use App\AdminModule\Component\ILoginFormFactory;

final class SignPresenter extends \Nepttune\Presenter\SignPresenter
{
    /** @var ILoginFormFactory */
    protected $iClientLoginFormFactory;

    /** @persistent */
    public $admin;

    public function __construct(ILoginFormFactory $iClientLoginFormFactory, \Nepttune\Component\ILoginFormFactory $ILoginFormFactory)
    {
        parent::__construct($ILoginFormFactory);

        $this->iClientLoginFormFactory = $iClientLoginFormFactory;
    }

    public function renderIn() : void
    {
        $this->template->admin = $this->admin;
    }

    public function handleAdmin() : void
    {
        $this->admin = !$this->admin;

        $this->template->admin = $this->admin;

        $this->redrawControl('login');
    }

    protected function createComponentClientLoginForm() : \App\AdminModule\Component\LoginForm
    {
        return $this->iClientLoginFormFactory->create();
    }
}
