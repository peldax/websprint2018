<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

use App\Model\EventModel;
use Nepttune\Component\BaseListComponent;
use Ublaboo\DataGrid\DataGrid;

final class EventList extends BaseListComponent
{
    protected const ACTIVE_FILTER = true;

    public function __construct(EventModel $eventModel)
    {
        parent::__construct();

        $this->repository = $eventModel;
    }

    protected function modifyList(DataGrid $grid): DataGrid
    {
        $grid->addColumnText('datetime', 'Datum objednávky')
            ->setSortable()
            ->setRenderer(function ($row){
                return $row->datetime->format('j.n.Y H:i');
            });
        $grid->addColumnText('price', 'Cena')
            ->setSortable();
        $grid->addColumnText('room_id', 'Pokoj')
            ->setRenderer(function ($row){
                return $row->room->name;
            });
        $grid->addColumnText('service_id', 'Služba')
            ->setRenderer(function ($row){
                return $row->service->name;
            });
        $grid->addColumnText('subservice_id', 'Varianta')
            ->setRenderer(function ($row){
                return $row->subservice->name;
            });

        return $grid;
    }
}
