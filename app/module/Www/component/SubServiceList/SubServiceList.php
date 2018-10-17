<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

use App\Model\SubServiceModel;
use Nepttune\Component\BaseListComponent;
use Ublaboo\DataGrid\DataGrid;

final class SubServiceList extends BaseListComponent
{
    protected const ACTIVE_FILTER = true;

    /** @var SubServiceModel */
    protected $subServiceModel;

    public function __construct(SubServiceModel $subServiceModel)
    {
        parent::__construct();

        $this->subServiceModel = $subServiceModel;
    }

    protected function modifyList(DataGrid $grid): DataGrid
    {
        $grid->addColumnText('number', 'Číslo')
            ->setSortable()
            ->setFilterText();
        $grid->addColumnText('password', 'Heslo')
            ->setFilterText();
        $grid->addColumnText('from', 'Obsazeno od')
            ->setRenderer(function ($row){
                return $row->from ? $row->from->format('j.n.Y') : null;
            })
            ->setFilterDateRange();
        $grid->addColumnText('to', 'obsazeno do')
            ->setRenderer(function ($row){
                return $row->from ? $row->from->format('j.n.Y') : null;
            })
            ->setFilterDateRange();

        return $grid;
    }
}
