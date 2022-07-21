<?php

namespace App\Services;

use App\Models\UserStore;
use App\User;

class UserStoreService
{
	private $UserStore;

    public function __construct(UserStore $UserStore)
    {
        $this->UserStore = $UserStore;
    }

	public function all(){
		return  $this->UserStore->query();
	}

    public function store($data){
        return $this->UserStore->create($data);
    }

    public function find($id){
        return $this->all()->where('id', $id);
    }

    public function getById($storeId){
        return $this->all()->where('id', $storeId);
    }

}
