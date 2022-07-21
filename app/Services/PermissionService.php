<?php

namespace App\Services;

use App\Models\Permission;

class PermissionService
{
	private $Permission;

    public function __construct(Permission $Permission)
    {
        $this->Permission = $Permission;
    }

	public function all(){
		return $this->Permission->query();
	}

    public function store($data){
        return $this->Permission->create($data);
    }

    public function find($aplikasi_id){
        return $this->all()->where('aplikasi_id', $aplikasi_id);
    }

}
