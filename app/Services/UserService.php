<?php

namespace App\Services;

use App\User;

class UserService
{
	private $User;

    public function __construct(User $User)
    {
        $this->User = $User;
    }

	public function all(){
		return  $this->User->query();
	}

    public function store($data){
        return $this->User->create($data);
    }

    public function find($nik){
        return $this->all()->where('nik', $nik);
    }

    public function getById($storeId){
        return $this->all()->where('id', $storeId);
    }

}
