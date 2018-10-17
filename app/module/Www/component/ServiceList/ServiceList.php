<?php

declare(strict_types = 1);

namespace App\WwwModule\Component;

use App\Enum\EServiceType;
use App\Model\ServiceModel;
use Nepttune\Component\BaseListComponent;
use Nette\Utils\Html;
use Ublaboo\DataGrid\DataGrid;

final class ServiceList extends BaseListComponent
{
    protected const ACTIVE_FILTER = true;
    protected $inlineAdd = true;
    protected $inlineEdit = true;

    public function __construct(ServiceModel $serviceModel)
    {
        parent::__construct();

        $this->repository = $serviceModel;
    }

    protected function modifyList(DataGrid $grid): DataGrid
    {
        $grid->addColumnLink('name', 'Jméno', ':Admin:Service:sub')
            ->setSortable()
            ->setFilterText();
        $grid->addColumnText('description', 'Popis')
            ->setFilterText();
        $grid->addColumnText('price', 'Cena')
            ->setFilterText();
        $grid->addColumnText('icon', 'Ikona')
            ->setFilterText();
        $grid->addColumnText('type', 'Type')
            ->setRenderer(function ($row){
                return EServiceType::ENUM[$row->type];
            })
            ->setFilterDateRange();

        return $grid;
    }

    public function modifyInlineForm(\Nette\Forms\Container $container): void
    {
        $container->addText('name')->setRequired();
        $container->addText('description')->setRequired();
        $container->addInteger('price')->setRequired();
        $container->addText('icon')->setRequired();
        $container->addSelect('type', null, EServiceType::ENUM)->setRequired();
    }
}
