<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

use Nepttune\Component\BaseFormComponent;
use Nette\Application\UI\Form;

final class EventForm extends BaseFormComponent
{
    protected function modifyForm(Form $form): Form
    {
        return $form;
    }
}
