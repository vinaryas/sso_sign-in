<?php

namespace App\Services;

use App\Models\Region;

class RegionService
{
	private $Region;

    public function __construct(Region $Region)
    {
        $this->Region = $Region;
    }

	public function all(){
		return $this->Region->query();
	}

    public function store($data){
        return $this->Region->create($data);
    }

    public function delete($data, $id){
    	return $this->Region->where('id', $id)->delete($data);
    }

    public function find($id){
        return $this->all()->where('id', $id);
    }

}
