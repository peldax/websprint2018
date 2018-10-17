<?php

declare(strict_types = 1);

namespace App\AdminModule\Component;

use Nepttune\Component\BaseListComponent;
use \Ublaboo\DataGrid\DataGrid;

final class UserList extends BaseListComponent
{
    protected $add = ':add';
    protected $edit = ':edit';

    public function __construct(\Nepttune\Model\UserModel $userModel)
    {
        parent::__construct();
        
        $this->repository = $userModel;
    }

    protected function modifyList(DataGrid $grid) : DataGrid
    {
        $grid->addColumnText('username', 'admin.username')
            ->setSortable();

        return $grid;
    }
}
