<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

use App\Model\RoomModel;
use Nepttune\Component\BaseListComponent;
use Nette\Utils\Random;
use Ublaboo\DataGrid\DataGrid;

final class RoomList extends BaseListComponent
{
    protected const ACTIVE_FILTER = true;
    protected $inlineAdd = true;
    protected $inlineEdit = true;

    public function __construct(RoomModel $roomModel)
    {
        parent::__construct();

        $this->repository = $roomModel;
    }

    protected function modifyList(DataGrid $grid): DataGrid
    {
        $grid->addAction('pswd', '', 'password!')
            ->setTitle('Vygenerovat nové heslo')
            ->setIcon('lock')
            ->setClass('btn btn-xs btn-primary');

        $grid->addColumnText('number', 'Číslo')
            ->setSortable()
            ->setFilterText();
        $grid->addColumnText('password', 'Heslo')
            ->setFilterText();

        return $grid;
    }

    public function modifyInlineForm(\Nette\Forms\Container $container): void
    {
        $container->addText('number');
    }

    public function saveInlineAdd(\stdClass $values): void
    {
        $values->password = Random::generate(10);

        parent::saveInlineAdd($values);
    }

    public function handlePassword(int $id)
    {
        $this->repository->findRow($id)->update(['password' => Random::generate(10)]);

        $this['list']->redrawControl('data');
    }
}
