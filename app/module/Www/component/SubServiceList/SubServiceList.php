<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

use App\Model\SubServiceModel;
use Nepttune\Component\BaseListComponent;
use Ublaboo\DataGrid\DataGrid;

final class SubServiceList extends BaseListComponent
{
    protected const ACTIVE_FILTER = true;

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
        $grid->addColumnText('name', 'Jméno')
            ->setSortable()
            ->setFilterText();
        $grid->addColumnText('price', 'Cena')
            ->setFilterText();
        $grid->addColumnText('availablefrom', 'Dostupná od')
            ->setRenderer(function ($row){
                return $row->from ? $row->from->format('j.n.Y') : null;
            })
            ->setFilterDateRange();
        $grid->addColumnText('availableto', 'Dostupná do')
            ->setRenderer(function ($row){
                return $row->from ? $row->from->format('j.n.Y') : null;
            })
            ->setFilterDateRange();

        return $grid;
    }

    public function getDataSource()
    {
        return parent::getDataSource()->where('service_id', $this->serviceId);
    }
}
