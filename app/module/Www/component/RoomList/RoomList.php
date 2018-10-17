<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

use App\Model\RoomModel;
use Nepttune\Component\BaseListComponent;
use Ublaboo\DataGrid\DataGrid;

final class RoomList extends BaseListComponent
{
    protected const ACTIVE_FILTER = true;

    /** @var RoomModel */
    protected $roomModel;

    public function __construct(RoomModel $roomModel)
    {
        parent::__construct();

        $this->roomModel = $roomModel;
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
