<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

use Nepttune\Component\BaseFormComponent;
use Nette\Application\UI\Form;

final class EventForm extends BaseFormComponent
{
    protected function modifyForm(Form $form): Form
    {
        return $form;
    }
}
