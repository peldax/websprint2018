<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

use Nepttune\Presenter\BaseAuthPresenter;

final class UserPresenter extends BaseAuthPresenter
{
    /**
     * @inject
     * @var  \App\AdminModule\Component\IUserFormFactory
     */
    public $iUserFormFactory;

    /**
     * @inject
     * @var  \App\AdminModule\Component\IUserListFactory
     */
    public $iUserListFactory;

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
    public function actionAdd() : void
    {

    }

    /**
     * @restricted
     * @root
     */
    public function actionEdit(int $id) : void
    {
        $this['userForm']->setDefaults($id);
    }

    protected function createComponentUserForm() : \App\AdminModule\Component\UserForm
    {
        return $this->iUserFormFactory->create();
    }

    protected function createComponentUserList() : \App\AdminModule\Component\UserList
    {
        return $this->iUserListFactory->create();
    }
}
