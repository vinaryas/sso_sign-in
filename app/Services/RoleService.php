<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
	private $Role;

    public function __construct(Role $Role)
    {
        $this->Role = $Role;
    }

	public function all(){
		return $this->Role->query();
	}

    public function store($data){
        return $this->Role->create($data);
    }

    public function find($aplikasi_id){
        return $this->all()->where('aplikasi_id', $aplikasi_id);
    }

}
