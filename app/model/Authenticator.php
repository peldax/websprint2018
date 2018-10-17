<?php

declare(strict_types = 1);

namespace App\Model;

use Nepttune\Model\UserModel;
use Nette\Security as NS;

final class Authenticator extends \Nepttune\Model\Authenticator
{
    /** @var RoomModel */
    private $roomModel;

    public function __construct(UserModel $userModel, RoomModel $roomModel)
    {
        parent::__construct($userModel);

        $this->roomModel = $roomModel;
    }

    public function authenticate(array $credentials)
    {
        list($username, $password) = $credentials;

        $row = $this->roomModel->findBy('password', $password)
            ->where('active', 1)->fetch();

        if ($row)
        {
            $data = $row->toArray();
            unset($data['password']);

            return new \Nette\Security\Identity($row->id, ['room'], $data);
        }

        return parent::authenticate($credentials);
    }
}
