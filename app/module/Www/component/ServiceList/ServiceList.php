<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

use App\Model\ServiceModel;
use Nepttune\Component\BaseListComponent;
use Ublaboo\DataGrid\DataGrid;

final class ServiceList extends BaseListComponent
{
    protected const ACTIVE_FILTER = true;

    /** @var ServiceModel */
    protected $serviceModel;

    public function __construct(ServiceModel $serviceModel)
    {
        parent::__construct();

        $this->serviceModel = $serviceModel;
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