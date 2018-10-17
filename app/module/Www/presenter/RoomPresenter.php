<?php

declare(strict_types = 1);

namespace App\AdminModule\Presenter;

use App\AdminModule\Component\IRoomListFactory;
use App\AdminModule\Component\RoomList;
use Nepttune\Presenter\BaseAuthPresenter;

final class RoomPresenter extends BaseAuthPresenter
{
    /** @var IRoomListFactory */
    protected $IRoomListFactory;

    public function __construct(IRoomListFactory $IRoomListFactory)
    {
        parent::__construct();

        $this->IRoomListFactory = $IRoomListFactory;
    }

    protected function createComponentRoomList() : RoomList
    {
        return $this->IRoomListFactory->create();
    }

    /**
     * @restricted
     * @root
     */
    public function actionDefault() : void
    {

    }
}
