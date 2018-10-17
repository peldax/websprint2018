<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

use App\Model\SubServiceModel;
use Nepttune\Component\BaseListComponent;
use Ublaboo\DataGrid\DataGrid;

final class SubServiceList extends BaseListComponent
{
    protected const ACTIVE_FILTER = true;
    protected $inlineAdd = true;
    protected $inlineEdit = true;

    /** @var int */
    protected $serviceId;

    public function __construct(SubServiceModel $subServiceModel)
    {
        parent::__construct();

        $this->repository = $subServiceModel;
    }

    public function setId(int $id) : void
    {
        $this->serviceId = $id;
    }

    protected function modifyList(DataGrid $grid): DataGrid
    {
        $grid->addToolbarButton(':Admin:Service:default', 'Zpět')
            ->setIcon('arrow-left')
            ->setClass('btn btn-primary');

        $grid->addColumnText('name', 'Jméno')
            ->setSortable()
            ->setFilterText();
        $grid->addColumnText('price', 'Cena')
            ->setSortable()
            ->setFilterText();
        $grid->addColumnText('availablefrom', 'Dostupná od')
            ->setRenderer(function ($row){
                return $row->availablefrom ? $row->availablefrom->format('j.n.Y') : null;
            });
        $grid->addColumnText('availableto', 'Dostupná do')
            ->setRenderer(function ($row){
                return $row->availableto ? $row->availableto->format('j.n.Y') : null;
            });

        return $grid;
    }

    public function modifyInlineForm(\Nette\Forms\Container $container): void
    {
        $container->addText('name')->setRequired();
        $container->addText('price')->setRequired();
        $container->addDatePicker('availablefrom');
        $container->addDatePicker('availableto');
    }

    public function saveInlineAdd(\stdClass $values): void
    {
        $values->service_id = $this->serviceId;

        parent::saveInlineAdd($values);
    }

    public function getDataSource()
    {
        return parent::getDataSource()->where('service_id', $this->serviceId);
    }
}
