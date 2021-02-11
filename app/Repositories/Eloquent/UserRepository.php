<?php

namespace App\Repositories\Eloquent;

use App\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct(User $model){
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function getByID($id){
        return $this->model->findById($id);
    }
}
