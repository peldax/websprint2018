<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

use App\Model\EventModel;
use App\Model\ServiceModel;
use App\Model\SubServiceModel;
use Nepttune\Component\BaseComponent;
use Nepttune\TI\ITranslator;
use Nepttune\TI\TTranslator;
use Nette\Application\UI\Form;
use Nette\Http\Session;
use Nette\Http\SessionSection;

final class EventForm extends BaseComponent implements ITranslator
{
    use TTranslator;

    protected const TEMPLATE_PATH = __DIR__ . '/EventForm.latte';

    /** @var ServiceModel */
    protected $serviceModel;

    /** @var SubServiceModel */
    protected $subServiceModel;

    /** @var SessionSection */
    protected $sessionSection;

    /** @var EventModel */
    protected $eventModel;

    /**
     * @persistent
     * @var int
     */
    public $step;

    public function __construct(ServiceModel $serviceModel, SubServiceModel $subServiceModel, Session $session, EventModel $eventModel)
    {
        parent::__construct();

        $this->serviceModel = $serviceModel;
        $this->subServiceModel = $subServiceModel;
        $this->sessionSection = $session->getSection('eventForm');
        $this->eventModel = $eventModel;
    }

    public function beforeRender(): void
    {
        parent::beforeRender();

        $this->template->step = $this->step ?? 1;
    }

    protected function createComponentFormStep1(): Form
    {
        $form = new Form();
        $form->setTranslator($this->translator);
        $form->setRenderer(new \Nextras\Forms\Rendering\Bs3FormRenderer());
        $form->addProtection('form.error.csrf');
        $form->getElementPrototype()->addAttributes(['class' => 'ajax']);

        $form->addSelect('service_id', 'Služba', $this->serviceModel->findActive()->fetchPairs('id', 'name'))
            ->setPrompt('--- Vyberte ---');
        $form->addDependentSelectBox('subservice_id', 'Varianta', $form['service_id'])
            ->setDependentCallback(function ($values)
            {
                if (!$values['service_id'])
                {
                    return new \NasExt\Forms\DependentData(['' => 'Nejprve vyberte službu']);
                }

                $rows = $this->subServiceModel->findBy('service_id', $values['service_id']);

                if (!$rows->count())
                {
                    return new \NasExt\Forms\DependentData(['' => 'Nejprve vyberte službu']);
                }

                return new \NasExt\Forms\DependentData($rows->fetchPairs('id', 'name'));
            });

        $submit = $form->addSubmit('submit', 'Pokračovat');
        $form->getRenderer()->primaryButton = $submit;

        $form->onSuccess[] = [$this, 'formStep1Success'];

        if (isset($this->sessionSection->step1))
        {
            $form->setDefaults($this->sessionSection->step1);
        }

        return $form;
    }

    public function formStep1Success(Form $form, \stdClass $values) : void
    {
        $this->sessionSection->step1 = $values;

        switch ($this->serviceModel->findRow($values->service_id)->fetch()->type)
        {
            case 'singleuse': $this->step = 3; break;
            default: $this->step = 2;
        }

        $this->redrawControl('eventFormSnippet');
    }

    protected function createComponentFormStep2() : Form
    {
        $form = new Form();
        $form->setTranslator($this->translator);
        $form->setRenderer(new \Nextras\Forms\Rendering\Bs3FormRenderer());
        $form->addProtection('form.error.csrf');
        $form->getElementPrototype()->addAttributes(['class' => 'ajax']);

        $form->addDatePicker('')

        $form->addSubmit('back', 'Zpět');
        $submit = $form->addSubmit('submit', 'Pokračovat');
        $form->getRenderer()->primaryButton = $submit;

        $form->onSuccess[] = [$this, 'formStep2Success'];

        if (isset($this->sessionSection->step2))
        {
            $form->setDefaults($this->sessionSection->step2);
        }

        return $form;
    }

    public function formStep2Success(Form $form, \stdClass $values) : void
    {
        $this->sessionSection->step2 = $values;

        $this->step = $this->step + ($form->isSubmitted() === 'submit' ? 1 : -1);

        $this->redrawControl('eventFormSnippet');
    }

    protected function createComponentFormStep3() : Form
    {
        $form = new Form();
        $form->setTranslator($this->translator);
        $form->setRenderer(new \Nextras\Forms\Rendering\Bs3FormRenderer());
        $form->addProtection('form.error.csrf');
        $form->getElementPrototype()->addAttributes(['class' => 'ajax']);

        $form->addSubmit('back', 'Zpět');
        $submit = $form->addSubmit('submit', 'Objednat');
        $form->getRenderer()->primaryButton = $submit;

        $form->onSuccess[] = [$this, 'formStep3Success'];

        if (isset($this->sessionSection->step2))
        {
            $form->setDefaults($this->sessionSection->step2);
        }

        return $form;
    }

    public function formStep3Success(Form $form, \stdClass $values) : void
    {
        $this->sessionSection->step2 = $values;

        $this->step = $this->step + ($form->isSubmitted() === 'submit' ? 1 : -1);

        $this->event
    }
}
