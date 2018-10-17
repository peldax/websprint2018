<?php

/**
 * This file is part of Nepttune (https://www.peldax.com)
 *
 * Copyright (c) 2018 Václav Pelíšek (info@peldax.com)
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <https://www.peldax.com>.
 */

declare(strict_types = 1);

namespace App\AdminModule\Component;

use Nepttune\Component\BaseFormComponent;
use \Nette\Application\UI\Form;

final class UserForm extends BaseFormComponent
{
    protected const REDIRECT = ':default';

    public function __construct(
        \Nepttune\Model\UserModel $userModel)
    {
        parent::__construct();

        $this->repository = $userModel;
    }

    protected function modifyForm(Form $form) : Form
    {
        $form->addText('username', 'admin.username')
            ->addRule([$this, static::VALIDATOR_UNIQUE], static::VALIDATOR_UNIQUE_MSG)
            ->setRequired();
        $form->addPassword('password', 'admin.password');
        $form->addPassword('password2', 'admin.password_again')
            ->addCondition($form::EQUAL, $form['password']);

        if ($this->rowId)
        {
            $form['username']->setDisabled();
        }
        else
        {
            $form['username']->setRequired();
            $form['password']->setRequired();
            $form['password2']->setRequired();
        }

        return $form;
    }

    public function formSuccess(\Nette\Application\UI\Form $form, \stdClass $values) : void
    {
        unset($values->password2);

        if ($values->password)
        {
            $values->password = \Nette\Security\Passwords::hash($values->password);
        }
        else
        {
            unset($values->password);
        }

        if (!$this->rowId)
        {
            $values->registered = new \Nette\Utils\DateTime();
        }

        parent::formSuccess($form, $values);
    }
}
