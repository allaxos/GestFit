<?php


namespace App\Repositories;

use App\User;
class UserRepository extends BaseRepository
{

    /**
     * UserRepository constructor.
     */
    public function __construct(User $user)
    {
        $this->model=$user;
    }
}
